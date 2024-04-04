import './bootstrap';


$(document).ready(function() {
    $('.question-card button').click(function() {
        $(this).prev().slideToggle();
    });
});



document.addEventListener("DOMContentLoaded", function() {
    const burgerBtn = document.getElementById('burger-btn');
    const mobileMenu = document.getElementById('mobile-menu-2');

    burgerBtn.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
        const expanded = mobileMenu.classList.contains('hidden') ? 'false' : 'true';
        burgerBtn.setAttribute('aria-expanded', expanded);
    });
});
module.exports = {
    theme: {
        fontFamily: {
            'sans': ['Poppins', 'sans-serif'],
        }
    }
};


document.addEventListener('DOMContentLoaded', function() {
    const dropdownToggle = document.querySelector('.hs-dropdown-toggle');
    const dropdownMenu = document.querySelector('.hs-dropdown-menu');

    dropdownToggle.addEventListener('click', function() {
        dropdownMenu.classList.toggle('hidden');
        dropdownMenu.classList.toggle('opacity-0');
    });

    document.addEventListener('click', function(event) {
        const isDropdownToggle = dropdownToggle.contains(event.target);
        const isDropdownMenu = dropdownMenu.contains(event.target);

        if (!isDropdownToggle && !isDropdownMenu) {
            dropdownMenu.classList.add('hidden');
            dropdownMenu.classList.remove('opacity-100');
            dropdownMenu.classList.add('opacity-0');
        }
    });
});
    


    // wishlist

      // Add a click event listener to all buttons with the 'wishlist-btn' class
      document.querySelectorAll('.wishlist-btn').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const isAdded = this.classList.contains('added');

            // Send an AJAX request to the server
            fetch('/wishlist/' + productId, {
                method: isAdded ? 'DELETE' : 'POST', // Use DELETE if product is already added, otherwise use POST
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Network response was not ok.');
            })
            .then(data => {
                // Toggle the 'added' class to change the button appearance
                this.classList.toggle('added');
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });