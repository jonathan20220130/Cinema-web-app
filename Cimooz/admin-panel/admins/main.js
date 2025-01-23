// document.addEventListener('DOMContentLoaded', function () {
//     const stars = document.querySelectorAll('.star');
//     let currentValue = 0;

//     stars.forEach(star => {
//         star.addEventListener('click', function (event) {
//             const rect = event.target.getBoundingClientRect();
//             const offsetX = event.clientX - rect.left;
//             const starWidth = rect.width / 5;

//             let newValue = Math.ceil(offsetX / starWidth);

//             // Check for half star
//             if (newValue * starWidth - offsetX < starWidth / 2) {
//                 if (newValue === 5) {
//                     newValue -= 1;
//                 } else {
//                     event.target.classList.add('half');
//                 }
//             } else {
//                 event.target.classList.remove('half');
//             }

//             // Toggle active class
//             stars.forEach((s, index) => {
//                 if (index < newValue) {
//                     s.classList.add('active');
//                 } else {
//                     s.classList.remove('active');
//                 }
//             });

//             currentValue = newValue;
//         });
//     });

//     stars.forEach(star => {
//         star.addEventListener('mousemove', function (event) {
//             const rect = event.target.getBoundingClientRect();
//             const offsetX = event.clientX - rect.left;
//             const starWidth = rect.width / 5;

//             let newValue = Math.ceil(offsetX / starWidth);

//             // Check for half star
//             if (newValue * starWidth - offsetX < starWidth / 2) {
//                 if (newValue === 5) {
//                     newValue -= 1;
//                 } else {
//                     event.target.classList.add('half');
//                 }
//             } else {
//                 event.target.classList.remove('half');
//             }
//         });

//         star.addEventListener('mouseleave', function () {
//             stars.forEach(s => s.classList.remove('half'));
//         });
//     });
// });















// // $(document).ready(function () {
// //     // Function to handle adding showtime
// //     $("#add-showtime-btn").click(function () {
// //         // Create a new container for showtime with input field and remove button
// //         var showtimeContainer = $('<div class="showtime-container"></div>');
// //         var showtimeInput = $('<input type="datetime-local" class="showtime-input" name="showtimes" />');
// //         var removeButton = $('<button type="button" class="remove-showtime-btn btn btn-danger">Remove</button>');

// //         // Append the input field and remove button to the container
// //         showtimeContainer.append(showtimeInput);
// //         showtimeContainer.append(removeButton);

// //         // Append the container to the container
// //         $("#showtimes-container").append(showtimeContainer);
// //     });

// //     // Function to handle removing showtime
// //     $(document).on("click", ".remove-showtime-btn", function () {
// //         // Remove the corresponding container
// //         $(this).closest(".showtime-container").remove();
// //     });

// //     // Form submission handling
// //     $("#movie-form").submit(function (event) {
// //         // Prevent default form submission
// //         event.preventDefault();

// //         // Validate showtimes
// //         var showtimesValid = true;
// //         $(".showtime-input").each(function () {
// //             var showtime = $(this).val();
// //             if (showtime === "") {
// //                 alert("Please enter a showtime.");
// //                 showtimesValid = false;
// //                 return false; // Exit the loop if one showtime is empty
// //             }
// //             var now = new Date();
// //             var selectedDate = new Date(showtime);
// //             if (selectedDate <= now) {
// //                 alert("Showtime must be a future date.");
// //                 showtimesValid = false;
// //                 return false; // Exit the loop if one showtime is in the past
// //             }
// //         });

// //         // If all showtimes are valid, submit the form
// //         if (showtimesValid) {
// //             this.submit();
// //         }
// //     });
// // });








// // // Get the value from the JavaScript variable
