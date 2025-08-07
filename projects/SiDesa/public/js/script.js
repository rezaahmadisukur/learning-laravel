function loadingBtnDisabled() {
    const btn = document.querySelector('button[type="submit"]');
    const loading = document.querySelector("#loading");
    btn.disabled = true;
    loading.innerHTML = `<div class="spinner-border text-light spinner-border-sm" style="width: 1rem; height: 1rem;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>`;
}
