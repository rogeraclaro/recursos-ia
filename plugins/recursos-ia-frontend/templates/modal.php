<!-- Floating Add Button -->
<button id="openRecursModal" class="floating-add-btn" title="Afegir Nou Recurs">
    ➕
</button>

<!-- Modal -->
<div id="recursModal" class="recurs-modal">
    <div class="recurs-modal-content">
        <div class="recurs-modal-header">
            <h2>➕ Afegir Nou Recurs</h2>
            <button class="recurs-modal-close" id="closeRecursModal">&times;</button>
        </div>

        <form id="recursForm" class="recurs-form">
            <div class="form-group">
                <label for="recursTitle">Títol del Recurs *</label>
                <input type="text" id="recursTitle" name="title" class="form-control" placeholder="Ex: ChatGPT" required>
            </div>

            <div class="form-group">
                <label for="recursUrl">URL *</label>
                <input type="url" id="recursUrl" name="url" class="form-control" placeholder="https://..." required>
            </div>

            <div class="form-group">
                <label for="recursDescription">Descripció *</label>
                <textarea id="recursDescription" name="description" class="form-control" rows="3" placeholder="Breu descripció del recurs..." required></textarea>
            </div>

            <div class="form-row">
                <div class="form-group form-col">
                    <label for="recursCategory">Categoria *</label>
                    <div class="select-with-add">
                        <select id="recursCategory" name="category" class="form-control" required>
                            <option value="">-- Selecciona una categoria --</option>
                        </select>
                        <button type="button" class="btn-add-option" id="addCategoryBtn" title="Afegir nova categoria">+</button>
                    </div>
                </div>

                <div class="form-group form-col">
                    <label for="recursSubcategory">Subcategoria *</label>
                    <div class="select-with-add">
                        <select id="recursSubcategory" name="subcategory" class="form-control" required>
                            <option value="">-- Selecciona una subcategoria --</option>
                        </select>
                        <button type="button" class="btn-add-option" id="addSubcategoryBtn" title="Afegir nova subcategoria">+</button>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary" id="cancelRecursBtn">Cancel·lar</button>
                <button type="submit" class="btn btn-primary">Afegir Recurs</button>
            </div>

            <div id="recursFormMessage" class="form-message"></div>
        </form>
    </div>
</div>

<!-- Add Category Modal -->
<div id="addCategoryModal" class="recurs-modal recurs-modal-small">
    <div class="recurs-modal-content">
        <div class="recurs-modal-header">
            <h2>Afegir Nova Categoria</h2>
            <button class="recurs-modal-close close-category-modal">&times;</button>
        </div>

        <form id="addCategoryForm" class="recurs-form">
            <div class="form-group">
                <label for="newCategoryName">Nom de la categoria *</label>
                <input type="text" id="newCategoryName" class="form-control" placeholder="Ex: 💬 Xats i Assistents IA" required>
            </div>

            <div class="form-group">
                <label for="newCategoryDescription">Descripció</label>
                <textarea id="newCategoryDescription" class="form-control" rows="2" placeholder="Descripció breu de la categoria..."></textarea>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary close-category-modal">Cancel·lar</button>
                <button type="submit" class="btn btn-primary">Crear Categoria</button>
            </div>

            <div id="categoryFormMessage" class="form-message"></div>
        </form>
    </div>
</div>

<!-- Add Subcategory Modal -->
<div id="addSubcategoryModal" class="recurs-modal recurs-modal-small">
    <div class="recurs-modal-content">
        <div class="recurs-modal-header">
            <h2>Afegir Nova Subcategoria</h2>
            <button class="recurs-modal-close close-subcategory-modal">&times;</button>
        </div>

        <form id="addSubcategoryForm" class="recurs-form">
            <div class="form-group">
                <label for="newSubcategoryName">Nom de la subcategoria *</label>
                <input type="text" id="newSubcategoryName" class="form-control" placeholder="Ex: Assistents Principals" required>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-secondary close-subcategory-modal">Cancel·lar</button>
                <button type="submit" class="btn btn-primary">Crear Subcategoria</button>
            </div>

            <div id="subcategoryFormMessage" class="form-message"></div>
        </form>
    </div>
</div>
