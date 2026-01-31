</div> <footer class="mt-5 py-3 text-center text-muted border-top">
        <p>&copy; <?= date('Y') ?> - <?= e($_SESSION['empresa_nome'] ?? 'Controle Systems') ?></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= URL_BASE ?>/assets/js/main.js"></script>
</body>
</html>