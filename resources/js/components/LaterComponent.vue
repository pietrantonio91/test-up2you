<template>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 my-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Download later PDF file using this URL:</h5>
                        <div class="card-text">
                            <a :href="baseUrl+url" target="_blank">{{ baseUrl+url }}</a>
                        </div>
                        <div class="mt-3">
                            <a :href="baseUrl" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
    },
    data() {
        return {
            url: localStorage.getItem("urlDownloadLater"),
            baseUrl: window.location.origin
        }
    },
};
</script>
