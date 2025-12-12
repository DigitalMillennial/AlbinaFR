function openCourseModal(courseId, title) {
  // читаем группы из скрытого JSON по id курса
  const el = document.getElementById(`groups-${courseId}`);
  const groups = el ? JSON.parse(el.textContent) : [];

  // строим options
  let optionsHtml = '';
  groups.forEach(group => {
    let scheduleText = '';
    if (group.group_schedules && group.group_schedules.length > 0) {
      scheduleText = group.group_schedules.map(s =>
        `${s.day_short} ${s.start_hm}-${s.end_hm}`
      ).join(', ');
    }
    optionsHtml += `<option value="${group.id}">${group.group_name}${scheduleText ? ' — ' + scheduleText : ''}</option>`;
  });

  const modal = document.createElement('div');
  modal.classList.add('modal', 'fade');
  modal.setAttribute('tabindex', '-1');

  modal.innerHTML = `
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Inscription: ${title}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="form-${courseId}">
            <input type="hidden" name="course_id" value="${courseId}">
            <div class="mb-3">
              <input type="text" class="form-control" name="nom" placeholder="Nom" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" name="prenom" placeholder="Prénom" required>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" name="email" placeholder="E-mail" required>
            </div>
            <div class="mb-3">
              <input type="tel" class="form-control" name="telephone" placeholder="Téléphone" required>
            </div>
            <!-- выбор группы В КОНЦЕ -->
            <div class="mb-3">
              <label class="form-label">Choisissez un groupe</label>
              <select class="form-select" name="group_id" required>
                <option value="">-- Sélectionnez --</option>
                ${optionsHtml}
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button class="btn btn-primary" onclick="submitCourseForm('${courseId}')">Suivant</button>
        </div>
      </div>
    </div>
  `;

  document.getElementById('modalContainer').appendChild(modal);
  const bsModal = new bootstrap.Modal(modal);
  bsModal.show();
  modal.addEventListener('hidden.bs.modal', () => modal.remove());
}


function submitCourseForm(courseId) {
  const form = document.getElementById(`form-${courseId}`);
  if (!form.checkValidity()) {
    form.reportValidity();
    return;
  }

  const formData = new FormData(form);

  fetch('/checkout', {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      'Accept': 'application/json'
    },
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    if (data.url) {
      window.location.href = data.url;
    } else {
      alert('Erreur lors de la création de la session de paiement.');
    }
  })
  .catch(() => {
    alert('Erreur de connexion au serveur.');
  });
}
