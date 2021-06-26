<template>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3 my-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Download PDF file</h5>
                        <div class="card-text">
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="images.first" placeholder="URL first image">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="images.second" placeholder="URL second image">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" v-model="images.third" placeholder="URL third image">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a @click="send" class="btn btn-rounded btn-success">Download PDF</a>
                            <a @click="later" class="btn btn-rounded btn-primary">View URL to download later</a>
                        </div>
                    </div>
                </div>
                <div v-if="errors && errors !== ''" class="mt-3">
                    <div class="alert alert-danger" v-html="errors">
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
            images: {
                first: "",
                second: "",
                third: ""
            },
            errors: ""
        }
    },
    methods: {
        send() {
            let _this = this;
            axios.post("/api/images", {
                firstImage: _this.images.first,
                secondImage: _this.images.second,
                thirdImage: _this.images.third,
            }).then((response) => {
                window.open(response.data.data.url)
            }, (error) => {
                if (error.response.status == 422) {
                    _.forEach(error.response.data.errors, function(item) {
                        _this.errors += item[0]+"<br>"
                    })
                } else {
                    _this.errors = "Something went wrong, please retry again later"
                }
                setTimeout(function() { _this.errors = ""; }, 3000);
            });
        },
        later() {
            let _this = this;
            axios.post("/api/images/later", {
                firstImage: _this.images.first,
                secondImage: _this.images.second,
                thirdImage: _this.images.third,
            }).then((response) => {
                localStorage.setItem("urlDownloadLater", response.data.data.url);
                window.location.replace('/later')
            }, (error) => {
                if (error.response.status == 422) {
                    _.forEach(error.response.data.errors, function(item) {
                        _this.errors += item[0]+"<br>"
                    })
                } else {
                    _this.errors = "Something went wrong, please retry again later"
                }
                setTimeout(function() { _this.errors = ""; }, 3000);
            });
        }
    }
};
</script>
