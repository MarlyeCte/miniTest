$(document).ready(function() {
    function applyFilters() {
        const selectedItem = $("#itemSearch").val();
        const selectedItemColor = $("#itemSearch-color").val();
        
        $(".boxContent").each(function() {
            const articleName = $(this).data("name").toLowerCase();
            const articleColor = $(this).data("color").toLowerCase();
            
            const articleNameMatch = selectedItem === 'all' || articleName.includes(selectedItem.toLowerCase());
            const articleColorMatch = selectedItemColor === 'all' || articleColor === selectedItemColor.toLowerCase();
            
            if (articleNameMatch && articleColorMatch) {
                $(this).css("display", "flex");
            } else {
                $(this).css("display", "none");
            }
        });
    }

    $("#itemSearch, #itemSearch-color").on("change", function() {
        applyFilters();
    });

    applyFilters(); // Appliquer les filtres initiaux au chargement de la page
});
