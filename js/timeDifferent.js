// Обработчик событий, вызывающийся при выборе даты и времени
var dateTimePicker = document.getElementById('date-time-picker');
if (dateTimePicker) {
  dateTimePicker.addEventListener("change", function() {
    var selectedDate = moment(dateTimePicker.value);

    // Получение часового пояса пользователя
    var userTimezoneOffset = selectedDate.utcOffset() / -60;

    // Получение часового пояса города специалиста (Канкун)
    var specialistTimezoneOffset = -5;

    // Вычисление времени, учитывая часовой пояс пользователя и специалиста
    var localTime = selectedDate.clone().utcOffset(userTimezoneOffset);
    var specialistTime = localTime.clone().utcOffset(specialistTimezoneOffset);

    // Преобразование времени в часовой пояс города специалиста (Канкун)
    var specialistCityTime = specialistTime.clone().tz("America/Cancun");

    // Форматирование даты и времени в нужный формат
    var formattedDateTime = specialistCityTime.format("DD.MM.YYYY HH:mm:ss");
    var customerTime = document.getElementById("customer_time");
    // customerTime.innerHTML = "<span id='customerTime'>";
    var formattedCustomerTime = selectedDate.format("DD.MM.YYYY HH:mm:ss");

    // Отображение даты и времени на странице
    var timeDiffElement = document.getElementById("specialist_time");
    // timeDiffElement.innerHTML = "<span id='timeDifference'>";
    timeDiffElement.innerHTML += "<span id='timeDifference'>"+formattedDateTime+"</span>";
    customerTime.innerHTML += "<span id='customerTime'>"+formattedCustomerTime+"</span>";
  });
}
