</div>
<!-- end card container -->

</div>
</div>
<!-- end Body full -->
</div>
<!-- end body -->
</div>
<footer style="text-align: center; padding: 10px; background-color: #f2f2f2;">
    © <?php echo date("Y"); ?> I Kadek Naryasa. All rights reserved.
</footer>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    function displayClock() {
        var date = new Date();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();

        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var strTime = hours + ':' + minutes + ':' + seconds;
        document.getElementById("clock").innerHTML = strTime;

        setTimeout(displayClock, 1000);
    }

    window.onload = displayClock;
</script>
</body>

</html>