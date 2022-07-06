<template>
    <v-main>
        <div>
            <div class="alert alert-success">
                <div class="container">
                    <button
                        type="button"
                        aria-hidden="true"
                        class="close"
                        @click="(event) => removeNotify(event, 'alert-success')"
                    >
                        <md-icon>clear</md-icon>
                    </button>
                    <div class="alert-icon">
                        <md-icon>check</md-icon>
                    </div>

                    <b> Pulpit nawigacyjny Studio Software </b>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <div class="main main-raised">Dashboard content</div>
        </div>
    </v-main>
</template>

<script>
export default {
    methods: {
        removeNotify(e, notifyClass) {
            var target = e.target;
            while (target.className.indexOf(notifyClass) === -1) {
                target = target.parentNode;
            }
            return target.parentNode.removeChild(target);
        },
    },
};
</script>
>

<style lang="scss" scoped>
.alert {
    margin-bottom: 100px;
}

.wrapper {
    margin-top: 100px;
}
</style>
