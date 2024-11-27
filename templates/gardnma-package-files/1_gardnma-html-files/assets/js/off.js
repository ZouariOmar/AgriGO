document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('offerForm');
    const submitButton = form.querySelector('button[type="submit"]');

    const titleInput = document.getElementById('titre');
    const priceInput = document.getElementById('prix');
    const locationInput = document.getElementById('localisation');
    const imageInput = document.getElementById('image');
    const detailInput = document.getElementById('detail');

    const errorMessages = {
        titre: document.getElementById('titreError'),
        prix: document.getElementById('prixError'),
        localisation: document.getElementById('localisationError'),
        image: document.getElementById('imageError'),
        detail: document.getElementById('detailError')
    };

    const validLocations = [
        'Ariana', 'Beja', 'Ben Arous', 'Bizerte', 'Gabes', 'Gafsa', 'Jendouba',
        'Kairouan', 'Kasserine', 'Kebili', 'Kef', 'Mahdia', 'Manouba', 'Médenine',
        'Monastir', 'Nabeul', 'Sfax', 'Sidi Bouzid', 'Siliana', 'Sousse',
        'Tataouine', 'Tozeur', 'Tunis', 'Zaghouan'
    ];

    function validateTitle() {
        const isValid = titleInput.value.length <= 45;
        errorMessages.titre.textContent = isValid ? '' : 'Le titre doit avoir un maximum de 45 caractères.';
        errorMessages.titre.style.display = isValid ? 'none' : 'block';
        return isValid;
    }

    function validatePrice() {
        const price = parseFloat(priceInput.value);
        const isValid = !isNaN(price) && price < 1000;
        errorMessages.prix.textContent = isValid ? '' : 'Le prix doit être inférieur à 1000 DT.';
        errorMessages.prix.style.display = isValid ? 'none' : 'block';
        return isValid;
    }


    function validateLocation() {
        const isValid = validLocations.includes(locationInput.value);
        errorMessages.localisation.textContent = isValid ? '' : 'Veuillez choisir une localisation valide.';
        errorMessages.localisation.style.display = isValid ? 'none' : 'block';
        return isValid;
    }


    function validateImage() {
        const imageRegex = /\.(jpeg|jpg|png)$/i;
        const isValid = imageRegex.test(imageInput.value);
        errorMessages.image.textContent = isValid ? '' : 'L\'image doit être au format JPEG ou PNG.';
        errorMessages.image.style.display = isValid ? 'none' : 'block';
        return isValid;
    }

    function validateDetail() {
        const isValid = detailInput.value.length <= 1000;
        errorMessages.detail.textContent = isValid ? '' : 'Le détail doit avoir un maximum de 1000 caractères.';
        errorMessages.detail.style.display = isValid ? 'none' : 'block';
        return isValid;
    }

    function validateForm() {
        const isValid = validateTitle() && validatePrice() && validatePhone() &&
                        validateLocation() && validateEmail() && validateImage() &&
                        validateDetail();
        submitButton.disabled = !isValid;
        return isValid;
    }

    titleInput.addEventListener('input', validateForm);
    priceInput.addEventListener('input', validateForm);
    locationInput.addEventListener('input', validateForm);
    imageInput.addEventListener('input', validateForm);
    detailInput.addEventListener('input', validateForm);

    form.addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
});

