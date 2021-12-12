<template>
    <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">{{icon}}</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">{{name}} Count</p>
                    <h4 class="mb-0">{{ data }}</h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><a class="text-sm font-weight-bolder" :href="action" >See All {{name}}</a></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: [
            'action',
            'name',
            'icon',
            'data'
        ]
    }
</script>
