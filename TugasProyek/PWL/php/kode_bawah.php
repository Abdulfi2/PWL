</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/bootstrap.bundle.min.js"></script>

	<script>
    //show hidden password
    $(document).ready(function() {
        $("#icon-click").click(function() {
            $("#icon").toggleClass('fa-eye-slash');
            var input = $("#pass");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>

<script>
    setInterval(() => {
        const time = document.querySelector(".displayy #time");
        let date = new Date();
        let hours = date.getHours();
        let minutes = date.getMinutes();
        let seconds = date.getSeconds();
        let day_night = "AM";
        if (hours > 12) {
            day_night = "PM";
            hours = hours - 12;
        }
        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        if (minutes < 10) {
            minutes = "0" + minutes;
        }
        if (hours < 10) {
            hours = "0" + hours;
        }
        time.textContent = hours + ":" + minutes + ":" + seconds + " " + day_night;
    });
</script>

</body>

</html>