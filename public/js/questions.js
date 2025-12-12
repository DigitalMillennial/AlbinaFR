document.addEventListener('DOMContentLoaded', function () {
    let index = 3; // 0,1 редактируемые; 2 = "Я не знаю"
    const addBtn = document.getElementById('add-answer');
    const wrapper = document.getElementById('answers-wrapper');

    if (!addBtn || !wrapper) return;

    addBtn.addEventListener('click', function () {
        const row = document.createElement('div');
        row.className = 'row g-3 align-items-center mb-2 answer-item';

        const yesId = `a${index}_yes`;
        const noId = `a${index}_no`;

        row.innerHTML = `
            <div class="col-6">
                <label class="form-label mb-1">Ответ ${index + 1}:</label>
                <input type="text" name="answers[${index}][text]" class="form-control" required>
            </div>
            <div class="col-3 d-flex align-items-center">
                <span class="me-2">Правильный?</span>
                <div class="form-check me-2">
                    <input class="form-check-input" type="radio" name="answers[${index}][is_correct]" value="1" id="${yesId}">
                    <label class="form-check-label" for="${yesId}">Да</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answers[${index}][is_correct]" value="0" id="${noId}" checked>
                    <label class="form-check-label" for="${noId}">Нет</label>
                </div>
            </div>
            <div class="col-2">
                <label class="form-label mb-1">Балл:</label>
                <input type="number" name="answers[${index}][weight]" class="form-control" value="0">
            </div>
            <div class="col-1 d-flex align-items-center">
                <button type="button" class="btn btn-sm btn-outline-danger remove-answer">&times;</button>
            </div>
        `;

        // навешиваем обработчик удаления
        row.querySelector('.remove-answer').addEventListener('click', function () {
            row.remove();
        });

        wrapper.appendChild(row);
        index++;
    });
});
