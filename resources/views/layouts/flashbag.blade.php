<div>
    @if (session('success'))
    <div id="successMessage" class="bg-green-100 m-2 md:w-[30vw] mx-auto border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    @if (session('error'))
    <div id="errorMessage" class="bg-red-100 m-2 md:w-[30vw] mx-auto border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif
</div>
<script>
    function hideMessages() {
        setTimeout(function() {
            var successMessage = document.getElementById('successMessage');
            var errorMessage = document.getElementById('errorMessage');
            if (successMessage) {
                successMessage.remove();
            }
            if (errorMessage) {
                errorMessage.remove();
            }
        }, 5000); 
    }

 
    window.onload = function() {
        hideMessages();
    };
</script>
