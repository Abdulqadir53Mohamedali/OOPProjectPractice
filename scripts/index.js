// Variables
const range1 = document.querySelector("#dateRange1");
const range2 = document.querySelector("#dateRange2");

const today = new Date(); // object already built in to JS // Variable not actually in use // Just a reminder

// Obtains the current month 
    //  set month , sets the actual month value for the new object created
    // get month + 1  , obtains the current month and adds one making it go to the next month 
const maxDate = new Date(new Date().setMonth(new Date().getMonth() + 1));

// Date Range Picker
const dateRangePicker = flatpickr(range1, {
	mode: "range", // sets the picker ti range selection mode allowing the user to select a start and end date 
	enableTime: false, // disables time selection , so users can only pick dates
	disableMobile: true,  // hides the calendar on small devices
	dateFormat: "l, d F",  // order in which date data is displayed
	minDate: "today", // sets the minimum date so that the users can onlu select from this date onward
	maxDate: maxDate, // sets the maximum date one month from today 
	showMonths: 2, // shows two month in the picker at once , so 3 for threre months etc
	locale: {
		firstDayOfWeek: 1, // sets monday as the first day of the weke in the calender
	},
	// disable dates
	disable: [
		{
			from: "2024-09-01", 
            // disable array disables  date sspecified within the range
			to: "2024-12-01",
		},
		// "2024-04-20",
		// (date) => date.getDay() % 6 === 0,
	],
	// plugins
	plugins: [
		new rangePlugin({
			input: range2,
		}),
	],
	onChange: function(selectedDates, dateStr, instance) {
        // When a date is selected, update the hidden fields with the formatted dates
        const formattedStartDate = selectedDates[0] ? selectedDates[0].toISOString().substring(0, 10) : '';
        const formattedEndDate = selectedDates[1] ? selectedDates[1].toISOString().substring(0, 10) : '';
		document.getElementById('hiddenStartDate').value = formattedStartDate;
		document.getElementById('hiddenEndDate').value = formattedEndDate;
    },
});

// The range1 and range2 act as elements , they are put in seperate inputs in my html form 
//  but link together when they are actually chosen
