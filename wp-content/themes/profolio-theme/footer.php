<footer class="site-footer">

    <div class="container footer-grid">

        <div>
            <h3>Portfolio.</h3>
            <p>Building modern web experiences with WordPress & PHP.</p>
        </div>

        <div>
            <h4>Quick Links</h4>
        </div>

        <div>
            <h4>Contact</h4>
            <p>Email: shoaibswl123@gmail.com</p>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© <?php echo date('Y'); ?> Portfolio. All rights reserved.</p>
    </div>

</footer>

<script>

    document.addEventListener("DOMContentLoaded", function () {

    const toggle = document.getElementById("menuToggle");
    const nav = document.getElementById("mainNav");

    if (!toggle || !nav) return;

    toggle.addEventListener("click", function () {
        nav.classList.toggle("active");
    });

});
</script>

<?php wp_footer(); ?>
</body>
</html>