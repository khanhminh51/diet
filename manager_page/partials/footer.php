    <!-- Footer -->
    <div class="footer">
        <div class="py-3 container">
            <p class="mb-0 text-center">@2022 All rights reserved. Tan Phu Interior Design</p>
        </div>
    </div>


    <?php
        if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/index.php") {
            ?>
                <script src="../js/app.js"></script>
            <?php
        }
        else {
            ?>
                <script src="../../js/app.js"></script>
            <?php
        }
    ?>
</body>
</html>