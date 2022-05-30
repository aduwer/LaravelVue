<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">First Component</div>
                    <div class="card-body">
                        <p>LARAVEL + VUE.JS - Image displayed by link</p>
                        <img
                            :src="image"
                            style="width: 100%"
                            alt="Zdjęcie Laravel+Vue"
                        />

                        <p>LARAVEL + VUE.JS - Image displayed by file path</p>
                        <img
                            :src="image1"
                            style="width: 100%"
                            alt="Zdjęcie image1"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            image: "https://mauricius.dev/images/laravel-vue.png",
            image1: "../../images/laravelvue.png",
        };
    },
};
</script>

<style lang="css"></style>
