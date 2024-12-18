


document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('offerForm');
    const submitButton = form.querySelector('button[type="submit"]');

    const titleInput = document.getElementById('libelle');
    const priceInput = document.getElementById('prix');
    const quantityInput = document.getElementById('Quantitie');
    const locationInput = document.getElementById('location');
    const categoryInput = document.getElementById('id_categorie');
    const detailInput = document.getElementById('description');
    const imageInput = document.getElementById('image');

    const errorMessages = {
        title: document.getElementById('libelleError'),
        price: document.getElementById('prixError'),
        quantity: document.getElementById('QuantitieError'),
        location: document.getElementById('locationError'),
        category: document.getElementById('categorieError'),
        detail: document.getElementById('descriptionError'),
        image: document.getElementById('imageError')
    };

    const validLocations = [
        'Ariana', 'Beja', 'Ben Arous', 'Bizerte', 'Gabes', 'Gafsa', 'Jendouba',
        'Kairouan', 'Kasserine', 'Kebili', 'Kef', 'Mahdia', 'Manouba', 'Médenine',
        'Monastir', 'Nabeul', 'Sfax', 'Sidi Bouzid', 'Siliana', 'Sousse',
        'Tataouine', 'Tozeur', 'Tunis', 'Zaghouan'
    ];

    function validateTitle() {
        const value = titleInput.value.trim();
        const isValid = value.length > 0 && value.length <= 25;
        errorMessages.title.textContent = isValid ? '' : 'Le titre doit avoir entre 1 et 25 caractères.';
        errorMessages.title.style.display = isValid ? 'none' : 'block';
        return isValid;
    }

    function validatePrice() {
        const price = parseFloat(priceInput.value);
        const isValid = !isNaN(price) && price > 0 && price < 5000;
        errorMessages.price.textContent = isValid ? '' : 'Le prix doit être entre 0 et 5000 DT.';
        errorMessages.price.style.display = isValid ? 'none' : 'block';
        return isValid;
    }

    function validateQuantity() {
        const quantity = parseFloat(quantityInput.value);
        const isValid = !isNaN(quantity) && quantity > 0 && quantity < 800;
        errorMessages.quantity.textContent = isValid ? '' : 'La quantité doit être entre 0 et 800 kg.';
        errorMessages.quantity.style.display = isValid ? 'none' : 'block';
        return isValid;
    }

    function validateLocation() {
        const isValid = validLocations.includes(locationInput.value);
        errorMessages.location.textContent = isValid ? '' : 'Veuillez choisir une localisation valide.';
        errorMessages.location.style.display = isValid ? 'none' : 'block';
        return isValid;
    }
    function validateCategory() {
        const isValid = categoryInput.value !== '';
        errorMessages.category.textContent = isValid ? '' : 'Veuillez sélectionner une catégorie.';
        errorMessages.category.style.display = isValid ? 'none' : 'block';
        return isValid;
    }
    

    function validateDetail() {
        const value = detailInput.value.trim();
        const isValid = value.length > 0 && value.length <= 1500;
        errorMessages.detail.textContent = isValid ? '' : 'Le détail doit avoir entre 1 et 1500 caractères.';
        errorMessages.detail.style.display = isValid ? 'none' : 'block';
        return isValid;
    }

    function validateImage() {
        const isValid = imageInput.value !== '';
        errorMessages.image.textContent = isValid ? '' : 'Veuillez sélectionner une image.';
        errorMessages.image.style.display = isValid ? 'none' : 'block';
        return isValid;
    }

    function validateForm() {
        console.log("Validating form...");
        const isValid = validateTitle() && validatePrice() && validateQuantity() &&
                        validateLocation() && validateCategory() && validateDetail() && validateImage();
        console.log(`Form is valid: ${isValid}`);
        submitButton.disabled = !isValid;
        return isValid;
    }

    // Call validateForm once to ensure initial state is correct
    validateForm();

    titleInput.addEventListener('input', validateForm);
    priceInput.addEventListener('input', validateForm);
    quantityInput.addEventListener('input', validateForm);
    locationInput.addEventListener('input', validateForm);
    categoryInput.addEventListener('change', validateForm); // Use 'change' for select inputs
    detailInput.addEventListener('input', validateForm);
    imageInput.addEventListener('change', validateForm); // Use 'change' for file inputs

    form.addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
});
