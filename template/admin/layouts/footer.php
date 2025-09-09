
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- CKEditor -->
    <script src="<?= asset('public/ckeditor/ckeditor.js') ?>"></script>
    
    <!-- Persian Date Picker -->
    <script src="<?= asset('public/jalalidatepicker/persian-date.min.js') ?>"></script>
    <script src="<?= asset('public/jalalidatepicker/persian-datepicker.min.js') ?>"></script>

    <script>
        $(document).ready(function(){
            // CKEditor initialization
            if(typeof CKEDITOR !== 'undefined') {
                CKEDITOR.replace('summary');
                CKEDITOR.replace('body');
            }

            // Persian Date Picker
            $("#published_at_view").persianDatepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                toolbox:{
                    calendarSwitch:{
                        enabled: true
                    }
                },
                timePicker: {
                    enabled: true,
                },
                observer : true,
                altField: '#published_at',
                altFormat: 'YYYY-MM-DD HH:mm:ss'
            });

            // Sidebar toggle for mobile
            $('#sidebarToggle').click(function() {
                $('.sidebar').toggleClass('show');
            });

            // Active navigation
            const currentPath = window.location.pathname;
            $('.sidebar .nav-link').each(function() {
                const href = $(this).attr('href');
                if (currentPath.includes(href) && href !== '/admin') {
                    $(this).addClass('active');
                }
            });

            // Table hover effects
            $('.table tbody tr').hover(
                function() {
                    $(this).addClass('table-hover-effect');
                },
                function() {
                    $(this).removeClass('table-hover-effect');
                }
            );
        });
    </script>

    <style>
        .table-hover-effect {
            background-color: #f1f5f9 !important;
            transform: scale(1.01);
            transition: all 0.2s ease;
        }
        
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

</body>
</html>