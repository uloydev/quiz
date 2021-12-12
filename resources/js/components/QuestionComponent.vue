
<template>
    <div class="container-md bg-custom-2 p-3 rounded-3">
            <p class="fs-5 fw-bolder mx-4 mb-5">{{ question.text }}</p>
            <div class="row rounded-3 bg-white p-3 mb-3 mx-4" 
            v-for="(option, optionIndex) in question.options" 
            :key="option.id">
                <div class="col-1">
                    <input type="radio" class="btn-check" autocomplete="off" :value="option.id" v-model="selected">
                    <label class="btn btn-outline-secondary" @click="pickOption(option)">
                        {{ String.fromCharCode(65 + optionIndex) }}
                    </label>
                </div>
                <div class="col-11">
                    {{option.text}}
                </div>
            </div>
        </div>
</template>

<script>
    export default {
        mounted() {
        },

        computed: {
        },
        methods: {
            pickOption: function (option) {
                this.question.answer = option.id
                this.selected = option.id
            },
        },
        props : [
            'question',
        ],
        data() {
            return {
                selected: 0
            }
        }
    }
</script>
