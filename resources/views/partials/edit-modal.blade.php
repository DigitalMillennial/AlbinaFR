<div id="editModal" class="inline-edit-modal">
  <div class="inline-edit-modal-content">
    <span class="inline-edit-close" onclick="closeEditor()">&times;</span>
    <form method="POST" action="{{ route('admin.content.update') }}">
      @csrf
      <input type="hidden" name="key" id="modalKey">
      <div class="mb-3">
        <label for="modalFr">FR</label>
        <textarea name="fr" id="modalFr"></textarea>
      </div>
      <div class="mb-3">
        <label for="modalRu">RU</label>
        <textarea name="ru" id="modalRu"></textarea>
      </div>
      <div class="mb-3">
        <label for="modalEn">EN</label>
        <textarea name="en" id="modalEn"></textarea>
      </div>
      <button type="submit" class="btn-save">Сохранить</button>
    </form>
  </div>
</div>
