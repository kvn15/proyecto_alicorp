
document.querySelector('.dropdown-btn').addEventListener('click', function() {
    this.classList.toggle("active");
    const dropdown = document.querySelector('.dropdown');
    dropdown.classList.toggle('expanded');
   
});

// window.onclick = function(event) {
//     if (!event.target.matches('.dropdown-btn')) {
//         var dropdowns = document.getElementsByClassName("dropdown");
//         for (var i = 0; i < dropdowns.length; i++) {
//             var openDropdown = dropdowns[i];
//             if (openDropdown.style.display === "block") {
//                 openDropdown.style.display = "none";
//             }
//         }
//         document.getElementById("dropdown-btn").classList.remove("active");
//     }
// };


document.querySelector('.dropdown1-btn').addEventListener('click', function() {
    this.classList.toggle("active");
    const dropdown = document.querySelector('.dropdown1');
    dropdown.classList.toggle('expanded');
});




