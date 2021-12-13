<template>
    <div>
        <div class="row text-center py-3">
            <div class="col-10 mx-auto">
                <div class="input-group input-group-static">
                    <label class="">Question Text</label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        :value="question.text"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
    props: ["token", "question"],
};
</script>
