<template>
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h2 class="d-inline-block text-custom-4 font-weight-bold py-2">{{ quiz.name }}</h2>
            <div class="d-inline-block border border-1 bg-custom-2 border-dark py-2 px-4 fs-4 font-weight-bold rounded-lg">
                {{ parseTime(timer.minute) }}:{{ parseTime(timer.second) }}
                </div>
        </div>
        <hr>
        <div class="row my-3 gy-4">
            <div class="col-1 p-1" 
            v-for="(question, index) in quiz.questions" 
            :key="question.id">
                <div class="text-white py-3 text-center font-weight-bold"
                :class="{
                    'bg-secondary': question.answer == 0,
                    'bg-primary': question.answer != 0,
                    'bg-danger': index == currentQuestion - 1,
                }"
                @click="currentQuestion = index + 1" >
                    {{index + 1}}
                </div>
            </div>
        </div>
        <div class="d-md-flex justify-content-md-between mb-4">
            <span class="fs-3 text-custom-4 fw-bolder"><span>{{ currentQuestion }}</span> of {{ questionsCount }} Question</span>
            <div>
                <button class="btn bg-custom-3 text-custom-1 px-5" :disabled='currentQuestion == 1' @click="currentQuestion--">Prev</button>
                <button class="btn bg-custom-3 text-custom-1 px-5" :disabled='currentQuestion == this.questionsCount' @click="currentQuestion++">Next</button>
                <button class="btn bg-success font-weight-bold px-5" @click="finishAttemp">Finish Attemp!</button>
            </div>
        </div>
        <Question class="container-md bg-custom-2 p-3 rounded-3" 
        v-for="(question,questionIndex) in quiz.questions" 
        :key="question.id" 
        v-show="questionIndex+1 == currentQuestion" :question="question" />
    </div>
</template>

<script>
    import axios from 'axios'
    import Question from './QuestionComponent.vue'

    export default {
        mounted() {
            axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
            axios.defaults.headers.common['X-CSRF-TOKEN'] = this.token
            console.log(url)
            this.timerInterval = setInterval(this.updateTimer, 1000)
        },
        methods: {
            updateTimer: function () {
                if (this.timer.second == 0) {
                    if (this.timer.minute == 0) {
                        this.finishAttemp()
                        return
                    }
                    this.timer.minute--
                    this.timer.second = 60
                }
                this.timer.second--
            },
            parseTime: function (num) {
                return num < 10 ? '0' + num : num
            },
            finishAttemp: function (){
                clearInterval(this.timerInterval)
                console.log('finished!')
                // axios.post('/')
            },
        },
        props : [
            'quiz',
            'token',
            'url',
        ],
        data() {
            return {
                questionsCount: this.quiz.questions.length,
                currentQuestion: 1,
                timer: {
                    minute: 1,
                    second: 0
                }
            }
        },
        components: {
            Question,
        }
    }
</script>
