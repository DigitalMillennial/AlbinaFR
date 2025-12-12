/* ============================================ */
/* ADMIN PANEL JAVASCRIPT - Modular Version */
/* ============================================ */

/**
 * Переключить видимость сайдбара (для мобильных устройств)
 */
function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  sidebar.classList.toggle('active');
}

/* ============================================ */
/* COURSES MANAGEMENT - Управление курсами */
/* ============================================ */

/**
 * Открыть модальное окно для добавления/редактирования курса
 * @param {number} courseId - ID курса (null для нового курса)
 */


/**
 * Сохранить курс
 * @param {number} courseId - ID курса
 * Backend должен отправить данные на API
 */
function saveCourse(courseId) {
  const form = document.getElementById('courseForm');
  if (form.checkValidity()) {
    // TODO: Backend integration
    // Отправка данных на API Laravel
    const formData = new FormData(form);
    
    console.log('Saving course:', Object.fromEntries(formData));
    alert('Cours enregistré avec succès! (Backend integration required)');
    bootstrap.Modal.getInstance(form.closest('.modal')).hide();
    
    // После успешного сохранения обновить таблицу
    // location.reload(); или обновить через AJAX
  } else {
    form.reportValidity();
  }
}



/* ============================================ */
/* SERVICES MANAGEMENT - Управление услугами */
/* ============================================ */

/**
 * Открыть модальное окно для добавления/редактирования услуги
 */
function openServiceModal(serviceId = null) {
  const isEdit = serviceId !== null;
  const modalTitle = isEdit ? 'Modifier le service' : 'Ajouter un nouveau service';
  
  const modal = document.createElement('div');
  modal.classList.add('modal', 'fade');
  modal.setAttribute('tabindex', '-1');
  
  modal.innerHTML = `
    <div class=\"modal-dialog modal-lg modal-dialog-centered\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\">${modalTitle}</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
        </div>
        <div class=\"modal-body\">
          <form id=\"serviceForm\">
            <div class=\"mb-3\">
              <label class=\"form-label\">Nom du service</label>
              <input type=\"text\" class=\"form-control\" name=\"name\" required>
            </div>
            <div class=\"row\">
              <div class=\"col-md-6 mb-3\">
                <label class=\"form-label\">Type</label>
                <input type=\"text\" class=\"form-control\" name=\"type\" required>
              </div>
              <div class=\"col-md-6 mb-3\">
                <label class=\"form-label\">Prix</label>
                <input type=\"text\" class=\"form-control\" name=\"price\" placeholder=\"Ex: 20€/h\" required>
              </div>
            </div>
            <div class=\"mb-3\">
              <label class=\"form-label\">Description</label>
              <textarea class=\"form-control\" name=\"description\" rows=\"4\" required></textarea>
            </div>
            <div class=\"mb-3\">
              <label class=\"form-label\">Statut</label>
              <select class=\"form-select\" name=\"status\" required>
                <option value=\"active\">Actif</option>
                <option value=\"inactive\">Inactif</option>
              </select>
            </div>
          </form>
        </div>
        <div class=\"modal-footer\">
          <button class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
          <button class=\"btn btn-primary\" onclick=\"saveService(${serviceId})\">
            ${isEdit ? 'Mettre à jour' : 'Ajouter'}
          </button>
        </div>
      </div>
    </div>
  `;
  
  document.getElementById('modalContainer').appendChild(modal);
  const bsModal = new bootstrap.Modal(modal);
  bsModal.show();
  
  modal.addEventListener('hidden.bs.modal', () => modal.remove());
}

function saveService(serviceId) {
  const form = document.getElementById('serviceForm');
  if (form.checkValidity()) {
    // TODO: Backend integration
    const formData = new FormData(form);
    console.log('Saving service:', Object.fromEntries(formData));
    alert('Service enregistré avec succès! (Backend integration required)');
    bootstrap.Modal.getInstance(form.closest('.modal')).hide();
  } else {
    form.reportValidity();
  }
}

function editService(serviceId) {
  // TODO: Backend integration
  openServiceModal(serviceId);
  console.log('Édition du service ID:', serviceId);
}

function deleteService(serviceId) {
  if (confirm('Êtes-vous sûr de vouloir supprimer ce service?')) {
    // TODO: Backend integration
    console.log('Suppression du service ID:', serviceId);
    alert('Service supprimé! (Backend integration required)');
  }
}

/* ============================================ */
/* BOOKINGS MANAGEMENT - Управление заявками */
/* ============================================ */

function filterBookings(status) {
  // TODO: Backend integration
  // Фильтровать таблицу или отправить запрос на API с фильтром
  console.log('Filtrage des réservations par statut:', status);
}

function viewBooking(bookingId) {
  // TODO: Backend integration
  alert(`Affichage de la réservation #${bookingId} (Backend integration required)`);
  console.log('Affichage de la réservation ID:', bookingId);
}

function editBooking(bookingId) {
  // TODO: Backend integration
  alert(`Édition de la réservation #${bookingId} (Backend integration required)`);
  console.log('Édition de la réservation ID:', bookingId);
}

function deleteBooking(bookingId) {
  if (confirm('Êtes-vous sûr de vouloir supprimer cette réservation?')) {
    // TODO: Backend integration
    console.log('Suppression de la réservation ID:', bookingId);
    alert('Réservation supprimée! (Backend integration required)');
  }
}

/* ============================================ */
/* STUDENTS MANAGEMENT - Управление студентами */
/* ============================================ */

function openStudentModal(studentId = null) {
  const isEdit = studentId !== null;
  const modalTitle = isEdit ? "Modifier l'étudiant" : "Ajouter un nouvel étudiant";
  
  const modal = document.createElement('div');
  modal.classList.add('modal', 'fade');
  modal.setAttribute('tabindex', '-1');
  
  modal.innerHTML = `
    <div class=\"modal-dialog modal-lg modal-dialog-centered\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\">${modalTitle}</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
        </div>
        <div class=\"modal-body\">
          <form id=\"studentForm\">
            <div class=\"row\">
              <div class=\"col-md-6 mb-3\">
                <label class=\"form-label\">Nom</label>
                <input type=\"text\" class=\"form-control\" name=\"lastname\" required>
              </div>
              <div class=\"col-md-6 mb-3\">
                <label class=\"form-label\">Prénom</label>
                <input type=\"text\" class=\"form-control\" name=\"firstname\" required>
              </div>
            </div>
            <div class=\"row\">
              <div class=\"col-md-6 mb-3\">
                <label class=\"form-label\">Email</label>
                <input type=\"email\" class=\"form-control\" name=\"email\" required>
              </div>
              <div class=\"col-md-6 mb-3\">
                <label class=\"form-label\">Téléphone</label>
                <input type=\"tel\" class=\"form-control\" name=\"phone\" required>
              </div>
            </div>
            <div class=\"mb-3\">
              <label class=\"form-label\">Niveau</label>
              <select class=\"form-select\" name=\"level\" required>
                <option value=\"\">Sélectionner...</option>
                <option value=\"A1\">A1</option>
                <option value=\"A2\">A2</option>
                <option value=\"B1\">B1</option>
                <option value=\"B2\">B2</option>
                <option value=\"C1\">C1</option>
              </select>
            </div>
            <div class=\"mb-3\">
              <label class=\"form-label\">Notes</label>
              <textarea class=\"form-control\" name=\"notes\" rows=\"3\"></textarea>
            </div>
          </form>
        </div>
        <div class=\"modal-footer\">
          <button class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
          <button class=\"btn btn-primary\" onclick=\"saveStudent(${studentId})\">
            ${isEdit ? 'Mettre à jour' : 'Ajouter'}
          </button>
        </div>
      </div>
    </div>
  `;
  
  document.getElementById('modalContainer').appendChild(modal);
  const bsModal = new bootstrap.Modal(modal);
  bsModal.show();
  
  modal.addEventListener('hidden.bs.modal', () => modal.remove());
}

function saveStudent(studentId) {
  const form = document.getElementById('studentForm');
  if (form.checkValidity()) {
    // TODO: Backend integration
    const formData = new FormData(form);
    console.log('Saving student:', Object.fromEntries(formData));
    alert('Étudiant enregistré avec succès! (Backend integration required)');
    bootstrap.Modal.getInstance(form.closest('.modal')).hide();
  } else {
    form.reportValidity();
  }
}

function searchStudents(query) {
  // TODO: Backend integration
  // Фильтровать таблицу или отправить запрос на API
  console.log("Recherche d'étudiants:", query);
}

function viewStudent(studentId) {
  // TODO: Backend integration
  alert(`Affichage de l'étudiant ID: ${studentId} (Backend integration required)`);
  console.log("Affichage de l'étudiant ID:", studentId);
}

function editStudent(studentId) {
  // TODO: Backend integration
  openStudentModal(studentId);
  console.log("Édition de l'étudiant ID:", studentId);
}

function deleteStudent(studentId) {
  if (confirm("Êtes-vous sûr de vouloir supprimer cet étudiant?")) {
    // TODO: Backend integration
    console.log("Suppression de l'étudiant ID:", studentId);
    alert("Étudiant supprimé! (Backend integration required)");
  }
}

/* ============================================ */
/* RESOURCES MANAGEMENT - Управление ресурсами */
/* ============================================ */

function openResourceModal(resourceId = null) {
  const isEdit = resourceId !== null;
  const modalTitle = isEdit ? 'Modifier la ressource' : 'Ajouter une nouvelle ressource';
  
  const modal = document.createElement('div');
  modal.classList.add('modal', 'fade');
  modal.setAttribute('tabindex', '-1');
  
  modal.innerHTML = `
    <div class=\"modal-dialog modal-lg modal-dialog-centered\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\">${modalTitle}</h5>
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
        </div>
        <div class=\"modal-body\">
          <form id=\"resourceForm\">
            <div class=\"mb-3\">
              <label class=\"form-label\">Titre</label>
              <input type=\"text\" class=\"form-control\" name=\"title\" required>
            </div>
            <div class=\"row\">
              <div class=\"col-md-6 mb-3\">
                <label class=\"form-label\">Catégorie</label>
                <select class=\"form-select\" name=\"category\" required>
                  <option value=\"\">Sélectionner...</option>
                  <option value=\"grammaire\">Grammaire</option>
                  <option value=\"vocabulaire\">Vocabulaire</option>
                  <option value=\"exercices\">Exercices</option>
                  <option value=\"audio\">Audio</option>
                  <option value=\"video\">Vidéo</option>
                </select>
              </div>
              <div class=\"col-md-6 mb-3\">
                <label class=\"form-label\">Niveau</label>
                <select class=\"form-select\" name=\"level\" required>
                  <option value=\"\">Sélectionner...</option>
                  <option value=\"A1\">A1</option>
                  <option value=\"A2\">A2</option>
                  <option value=\"B1\">B1</option>
                  <option value=\"A1-A2\">A1-A2</option>
                </select>
              </div>
            </div>
            <div class=\"mb-3\">
              <label class=\"form-label\">Fichier</label>
              <input type=\"file\" class=\"form-control\" name=\"file\" ${isEdit ? '' : 'required'}>
            </div>
            <div class=\"mb-3\">
              <label class=\"form-label\">Description</label>
              <textarea class=\"form-control\" name=\"description\" rows=\"3\"></textarea>
            </div>
          </form>
        </div>
        <div class=\"modal-footer\">
          <button class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
          <button class=\"btn btn-primary\" onclick=\"saveResource(${resourceId})\">
            ${isEdit ? 'Mettre à jour' : 'Ajouter'}
          </button>
        </div>
      </div>
    </div>
  `;
  
  document.getElementById('modalContainer').appendChild(modal);
  const bsModal = new bootstrap.Modal(modal);
  bsModal.show();
  
  modal.addEventListener('hidden.bs.modal', () => modal.remove());
}

function saveResource(resourceId) {
  const form = document.getElementById('resourceForm');
  if (form.checkValidity()) {
    // TODO: Backend integration
    const formData = new FormData(form);
    console.log('Saving resource:', Object.fromEntries(formData));
    alert('Ressource enregistrée avec succès! (Backend integration required)');
    bootstrap.Modal.getInstance(form.closest('.modal')).hide();
  } else {
    form.reportValidity();
  }
}

function downloadResource(resourceId) {
  // TODO: Backend integration
  alert(`Téléchargement de la ressource ID: ${resourceId} (Backend integration required)`);
  console.log('Téléchargement de la ressource ID:', resourceId);
}

function editResource(resourceId) {
  // TODO: Backend integration
  openResourceModal(resourceId);
  console.log('Édition de la ressource ID:', resourceId);
}

function deleteResource(resourceId) {
  if (confirm('Êtes-vous sûr de vouloir supprimer cette ressource?')) {
    // TODO: Backend integration
    console.log('Suppression de la ressource ID:', resourceId);
    alert('Ressource supprimée! (Backend integration required)');
  }
}

/* ============================================ */
/* PAGES MANAGEMENT - Управление страницами */
/* ============================================ */

function editPage(pageName) {
  // TODO: Backend integration
  alert(`Édition de la page: ${pageName} (Backend integration required)

Cette fonctionnalité ouvrira un éditeur de contenu.`);
  console.log('Édition de la page:', pageName);
}

function previewPage(pageName) {
  // Открыть превью страницы в новом окне
  window.open(`${pageName}.html`, '_blank');
}

/* ============================================ */
/* EVENT LISTENERS - Обработчики событий */
/* ============================================ */

// Закрыть сайдбар при клике вне его на мобильных
document.addEventListener('click', function(event) {
  const sidebar = document.getElementById('sidebar');
  const mobileToggle = document.querySelector('.mobile-toggle');
  
  if (window.innerWidth <= 1024) {
    if (sidebar && mobileToggle && !sidebar.contains(event.target) && !mobileToggle.contains(event.target)) {
      sidebar.classList.remove('active');
    }
  }
});

// Предотвратить закрытие сайдбара при клике внутри него
const sidebar = document.getElementById('sidebar');
if (sidebar) {
  sidebar.addEventListener('click', function(event) {
    event.stopPropagation();
  });
}

// Обработка форм настроек
const settingsForm = document.getElementById('settingsForm');
if (settingsForm) {
  settingsForm.addEventListener('submit', function(e) {
    e.preventDefault();
    // TODO: Backend integration
    const formData = new FormData(settingsForm);
    console.log('Saving settings:', Object.fromEntries(formData));
    alert('Paramètres enregistrés avec succès! (Backend integration required)');
  });
}

const socialForm = document.getElementById('socialForm');
if (socialForm) {
  socialForm.addEventListener('submit', function(e) {
    e.preventDefault();
    // TODO: Backend integration
    const formData = new FormData(socialForm);
    console.log('Saving social links:', Object.fromEntries(formData));
    alert('Réseaux sociaux enregistrés avec succès! (Backend integration required)');
  });
}

console.log('Admin panel initialized. Ready for Laravel backend integration.');


function editCourse(id) {
  fetch(`/admin/courses/${id}/edit`)
    .then(response => response.json())
    .then(course => {
      // Заполняем форму
      const form = document.getElementById('courseForm');
      form.action = `/admin/courses/${id}`;

      form.title.value = course.title;
      form.niveau.value = course.niveau;
      form.type.value = course.type;
      form.price.value = course.price;
      form.nb_lessons.value = course.nb_lessons;
      form.duration_weeks.value = course.duration_weeks;
      form.is_active.value = course.is_active ? 'active' : 'inactive';
      form.description.value = course.description;

      // Удаляем старый _method=PUT, если есть
      const oldMethod = form.querySelector('input[name="_method"]');
      if (oldMethod) oldMethod.remove();

      // Добавляем _method=PUT
      const methodInput = document.createElement('input');
      methodInput.type = 'hidden';
      methodInput.name = '_method';
      methodInput.value = 'PUT';
      form.appendChild(methodInput);

      // Открываем модалку через Bootstrap
      const modal = new bootstrap.Modal(document.getElementById('addCourseModal'));
      modal.show();
    })
    .catch(error => {
      console.error('Erreur lors du chargement du cours :', error);
      alert('Impossible de charger les données du cours.');
    });
}

// ============================================
// INLINE TEXT EDITING — Редактирование текста на странице
// ============================================

function openEditor(key) {
  fetch(`/admin/content/get/${key}`)
    .then(res => res.json())
    .then(data => {
      document.getElementById('modalKey').value = key;
      document.getElementById('modalFr').value = data.fr || '';
      document.getElementById('modalRu').value = data.ru || '';
      document.getElementById('modalEn').value = data.en || '';
      document.getElementById('editModal').style.display = 'flex';
    })
    .catch(err => {
      console.error('Ошибка загрузки перевода:', err);
      alert('Не удалось загрузить данные для редактирования.');
    });
}

function closeEditor() {
  document.getElementById('editModal').style.display = 'none';
}

function saveTranslation() {
  const key = document.getElementById('modalKey').value;
  const fr = document.getElementById('modalFr').value;
  const ru = document.getElementById('modalRu').value;
  const en = document.getElementById('modalEn').value;

  fetch('/admin/content', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({ key, fr, ru, en })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      closeEditor();
      window.location.reload(); // 👈 Возврат на ту же страницу
    } else {
      alert('Ошибка при сохранении');
    }
  })
  .catch(err => {
    console.error('Ошибка сохранения:', err);
    alert('Ошибка сети');
  });
}

