function validateForm() {
    var email = document.getElementById('typeEmailX').value.trim();
    var password = document.getElementById('typePasswordX').value.trim();

   
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    
    if (email === '' || password === '' || !emailRegex.test(email)) {
        document.getElementById('error').style.display = 'block';
        return false;
    } else {
        document.getElementById('error').style.display = 'none';
        return true; 
    }
}