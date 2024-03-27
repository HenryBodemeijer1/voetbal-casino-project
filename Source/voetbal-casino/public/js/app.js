document.addEventListener('DOMContentLoaded', function () {
    var showMoreBtn = document.getElementById('show-more-btn');
    var poulesCount = 8;

    function showMorePoules() {
        var hiddenPoules = document.querySelectorAll('.poule-box.hidden');
    
        for (var i = 0; i < Math.min(hiddenPoules.length, 2); i++) {
            hiddenPoules[i].classList.remove('hidden');
        }
    
        poulesCount += 2;
    
        // Check if there are hidden poules and show/hide the button
        checkHiddenPoules();
    }

    // Show more poules when the button is clicked
    showMoreBtn.addEventListener('click', showMorePoules);

    // Show more poules initially (optional)
    showMorePoules();

    // Check if there are hidden poules and show/hide the button
    function checkHiddenPoules() {
        var hiddenPoules = document.querySelectorAll('.poule-box.hidden');
        if (hiddenPoules.length === 0) {
            showMoreBtn.style.display = 'none';
        } 
    }
});