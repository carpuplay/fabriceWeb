document.addEventListener("DOMContentLoaded", () => {
    let currentStep = 0;

    function showStep(step) {
        const steps = document.querySelectorAll('.step');
        steps.forEach((stepElement, index) => {
            stepElement.classList.toggle('active', index === step);
        });
    }

    function nextStep() {
        const steps = document.querySelectorAll('.step');
        if (currentStep < steps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    }

    showStep(currentStep);

    function displayError(input, message) {
        const errorMessage = input.nextElementSibling;
        errorMessage.textContent = message;
        errorMessage.style.display = "block";
        input.classList.add("error");
    }

    function clearError(input) {
        const errorMessage = input.nextElementSibling;
        errorMessage.textContent = "";
        errorMessage.style.display = "none";
        input.classList.remove("error");
    }

    function validateStep1() {
        const nom = document.querySelector('input[name="nom"]');
        const prenom = document.querySelector('input[name="prenom"]');
        const numetudiant = document.querySelector('input[name="numetudiant"]');
        let valid = true;

        clearError(nom);
        clearError(prenom);
        clearError(numetudiant);

        if (!nom.value || nom.value.length < 2) {
            displayError(nom, "Le nom doit contenir au moins 2 caractères.");
            valid = false;
        }

        if (!prenom.value || prenom.value.length < 2) {
            displayError(prenom, "Le prénom doit contenir au moins 2 caractères.");
            valid = false;
        }

        if (!numetudiant.value || numetudiant.value.length !== 8 || isNaN(numetudiant.value)) {
            displayError(numetudiant, "Le numéro d'étudiant doit contenir 8 chiffres.");
            valid = false;
        }

        if (valid) {
            nextStep();
        }
    }

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }

    function validatePasswordStrength(password) {
        const minLength = 8;
        const hasUpperCase = /[A-Z]/.test(password);
        const hasLowerCase = /[a-z]/.test(password);
        const hasNumbers = /[0-9]/.test(password);
        const hasSpecialChars = /[!@#$%^&*+-_()<>\[\]]/.test(password);

        return password.length >= minLength && hasUpperCase && hasLowerCase && hasNumbers && hasSpecialChars;
    }

    function validateStep2() {
        const email = document.querySelector('input[name="email"]');
        const password = document.querySelector('input[name="password"]');
        const confirmPassword = document.querySelector('input[name="password-confirm"]');
        let valid = true;

        clearError(email);
        clearError(password);
        clearError(confirmPassword);

        if (!validateEmail(email.value)) {
            displayError(email, "Veuillez entrer une adresse email valide.");
            valid = false;
        }

        if (!validatePasswordStrength(password.value)) {
            displayError(password, "Le mot de passe doit contenir au moins 8 caractères, incluant des majuscules, minuscules, chiffres et caractères spéciaux.");
            valid = false;
        }

        if (password.value !== confirmPassword.value) {
            displayError(confirmPassword, "Les mots de passe ne correspondent pas.");
            valid = false;
        }

        if (valid) {
            nextStep();
        }
    }

    function validateStep3() {
        const numeroTel = document.querySelector('input[name="numerotel"]');
        let valid = true;

        clearError(numeroTel);

        if (numeroTel.value.length !== 10 || isNaN(numeroTel.value)) {
            displayError(numeroTel, "Le numéro de téléphone doit contenir 10 chiffres.");
            valid = false;
        }

        if (valid) {
            nextStep();
        }
    }

    document.getElementById('multiStepForm').addEventListener('submit', function (event) {
        event.preventDefault();

        validateStep3();

        if (currentStep === 2) {
            this.submit();
        }
    });

    window.validateStep1 = validateStep1;
    window.validateStep2 = validateStep2;
    window.validateStep3 = validateStep3;
});
