let userBox = document.querySelector('.header .flex .account-box');
let navbar = document.querySelector('.header .flex .navbar');

document.querySelector('#user-btn').onclick = () => {
    userBox.classList.toggle('active');
    navbar.classList.remove('active');
}

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
    userBox.classList.remove('active');
}

window.onscroll = () =>{
    userBox.classList.remove('active');
    navbar.classList.remove('active');
}




// get the modal
var modal = document.getElementById('myModal');

// get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('maisy');
var modalImg = document.getElementById("modal-img");


if(img !== null){
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}}

// get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// when the user clicks on <span> (x), close the modal
if(span){
    span.onclick = function(){
        modal.style.display = "none";
    }
}

$(document).ready(function(){  
    $(".box:gt(3)").addClass("hidden");
    
    $("#load-button").click(function() {
        $(".box.hidden").slice(0, 3).removeClass("hidden"); // Show the next 3 hidden posts
        if ($(".box.hidden").length === 0) {
            $(this).hide(); // Hide the button when all posts are shown
        }
    });
})





const countryCountyMap = {
    "United States Of America": ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut",
        "Delaware", "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas",
        "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota",
        "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey",
        "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon",
        "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas",
        "Utah", "Vermont", "Virginia", "Washington", "West Virginia", "Wisconsin", "Wyoming"],

    "Romania": ["Alba", "Arad", "Argeș", "Bacău", "Bihor", "Bistrița-Năsăud", "Botoșani", "Brașov",
        "Brăila", "Buzău", "Caraș-Severin", "Călărași", "Cluj", "Constanța", "Covasna", "Dâmbovița",
        "Dolj", "Galați", "Gorj", "Harghita", "Hunedoara", "Ialomița", "Iași", "Ilfov", "Maramureș",
        "Mehedinți", "Mureș", "Neamț", "Olt", "Prahova", "Satu Mare", "Sălaj", "Sibiu", "Suceava",
        "Teleorman", "Timiș", "Tulcea", "Vaslui", "Vâlcea", "Vrancea"],

    "Greece": ["Aegean", "Attica", "Central Greece", "Central Macedonia", "Crete", "Eastern Macedonia and Thrace",
        "Epirus", "Ionian Islands", "North Aegean", "Peloponnese", "South Aegean", "Thessaly",
        "Western Greece", "Western Macedonia"],

    "Netherlands": ["Drenthe", "Flevoland", "Friesland", "Gelderland", "Groningen", "Limburg", "North Brabant",
        "North Holland", "Overijssel", "South Holland", "Utrecht", "Zeeland"]
};

function populateCounties() {
    const countrySelect = document.getElementById('country');
    const countySelect = document.getElementById('county');
    if(countrySelect !== null){
        const selectedCountry = countrySelect.value;

        countySelect.innerHTML = '<option value="">Select County</option>'

        if(selectedCountry && countryCountyMap[selectedCountry]) {
            countryCountyMap[selectedCountry].forEach(county =>{
                const option = document.createElement("option");
                option.value = county;
                option.textContent = county;
                countySelect.appendChild(option);
            });
            countySelect.disabled = false;
        } else{
            countySelect.disabled = true;
        }
    }

}

var country = document.getElementById('country');
if(country !== null){
    document.getElementById('country').addEventListener('change', populateCounties)

}

$(document).ready(function() {
    // Array of countries (you can replace it with a dynamic list if needed)
    var countries = [
        "United States Of America",
        "Romania",
        "Greece",
        "Netherlands"
        // Add more countries as needed
    ];
    if(document.getElementsByClassName('country') !== null){
        $("#country").autocomplete({
            source: countries
        });
    }
    // Initialize autocomplete for the country input field

});

$(document).ready(function() {
    var $ascending = $("#ascendingButton");
    var $descending = $("#descendingButton");

    if ($descending.length > 0) { // Check if the descending button exists
        $ascending.on("click", function() {
            sortTable(true);
        });

        $descending.on("click", function() {
            sortTable(false);
        });
    }

    function sortTable(ascending) {
        var $table = $("#watchTable");
        var $tbody = $table.find("tbody");
        var $rows = $tbody.find(".sortableRow")

        $rows.sort(function(a, b) {
            var aValue = $(a).find("td").eq(3).text().toLowerCase();
            var bValue = $(b).find("td").eq(3).text().toLowerCase();
            if (ascending) {
                return aValue.localeCompare(bValue);
            } else {
                return bValue.localeCompare(aValue);
            }
        });

        // Reorder the rows in the table
        $tbody.empty().append($rows);
    }
});







$(document).ready(function() {
    var $ascending = $("#ascendingButton");
    var $descending = $("#descendingButton");

    if ($descending.length > 0) { // Check if the descending button exists
        $ascending.on("click", function() {
            sortTable(true);
        });

        $descending.on("click", function() {
            sortTable(false);
        });
    }

    function sortTable(ascending) {
        var $table = $("#pricetable");
        var $tbody = $table.find("#tablebody");
        var $rows = $tbody.find(".sortableRow");

        $rows.sort(function(a, b) {
            // var aValue = $(a).find(".fewstem").text().replace('$', '').replace('/stem', '');
            // var bValue = $(b).find(".fewstem").text().replace('$', '').replace('/stem', '');

            var aValue = parseFloat($(a).find(".fewstem").text().replace('$', '').replace('/stem', ''));
            var bValue = parseFloat($(b).find(".fewstem").text().replace('$', '').replace('/stem', ''));
            
            if (ascending) {
                return aValue - bValue;
            } else {
                return bValue - aValue;
            }
        });

        // Reorder the rows in the table
        $tbody.empty().append($rows);
    }
});