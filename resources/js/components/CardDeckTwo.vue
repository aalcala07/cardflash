<template>
    <div>
        <p>{{ currentCard }}/{{mutableCards.length}}</p>
        <div class="progress mb-4">
            <div class="progress-bar bg-success" v-bind:style="correctProgressBarStyle">
            </div>
            <div class="progress-bar bg-danger" v-bind:style="incorrectProgressBarStyle">
            </div>
        </div>
        <v-touch v-on:swipeleft="onSwipeLeft" v-on:swiperight="onSwipeRight" class="swipe-container">
            <div v-if="showResults" class="card">
                <div class="card-body d-flex flex-column">
                    <h5>Results</h5>
                    <h1>{{ correctCount }} / {{ mutableCards.length }}</h1>
                    <button @click="restart()" class="btn btn-success mt-auto">
                        Restart
                    </button>
                </div>
            </div>
            <div v-else class="card">
                <div v-if="showAnswer" class="card-body d-flex flex-column">
                    <h3>{{ activeCard.answer }}</h3>
                    <div class="mt-auto d-flex">
                        <button
                            @click="
                                correctCount++
                                tabulateAnswer(activeCard, true)
                                nextCard()
                            "
                            class="btn btn-success flex-fill mr-3"
                        >
                            Correct
                        </button>
                        <button
                            @click="
                                tabulateAnswer(activeCard, false)
                                nextCard()"
                            class="btn btn-danger flex-fill"
                        >
                            Incorrect
                        </button>
                    </div>
                </div>
                <div v-else class="card-body d-flex flex-column">
                    <h3>{{ activeCard.primary_text }}</h3>
                    <p>{{ activeCard.secondary_text }}</p>
                    <button
                        @click="showAnswer = true"
                        class="btn btn-primary mt-auto"
                    >
                        Show Answer
                    </button>
                </div>
            </div>
        </v-touch>
    </div>
</template>

<style>

.swipe-container {
}

.progress {
    /* height: 20px; */
    /* border-radius: 10px; */
    /* opacity: 0.5 */
}

.progress-bar {
    /* background: rgb(67, 95, 253); */
    /* border-radius: 10px; */
}
</style>

<script>
export default {
    props: ['cards'],
    data() {
        return {
            mutableCards: this.cards,
            activeIndex: 0,
            showAnswer: false,
            showResults: false,
            correctCount: 0,
            scorecard: {
                correct: [],
                incorrect: []
            }
        }
    },
    created: function() {
    },
    computed: {
        activeCard: function() {
            return this.mutableCards[this.activeIndex]
        },
        progress: function() {
            return (this.activeIndex / this.mutableCards.length) * 100
        },
        correctProgressBarStyle: function() {
            return {
                width: ((this.scorecard.correct.length / this.mutableCards.length) * 100) + "%",
                // borderRadius: this.scorecard.incorrect.length ? "10px 0 0 10px" : "10px"
            }
        },
        incorrectProgressBarStyle: function() {
            return {
                width: ((this.scorecard.incorrect.length / this.mutableCards.length) * 100) + "%",
                // borderRadius: this.scorecard.correct.length ? "0 10px 10px 0" : "10px"
            }
        },
        currentCard: function () {
            let current = this.activeIndex + 1
            if (current > this.mutableCards.length) {
                return this.activeIndex
            } else {
                return current
            }
        }
    },
    methods: {
        onSwipeRight() {
            console.log('onSwipeRight');
            this.showResults = false

            if (this.showAnswer) {
                this.showAnswer = false
            } else {
                this.previousCard()
            }
        },
        onSwipeLeft() {
            console.log('onSwipeLeft');

            if (this.showResults) {
                this.showAnswer = false
                this.restart()
                return
            }

            if (this.showAnswer) {
                this.nextCard()
            } else {
                this.showAnswer = true
            }
                
        },
        tabulateAnswer(card, correct) {
            this.removeFromArray(card.id, this.scorecard.correct)
            this.removeFromArray(card.id, this.scorecard.incorrect)

            if (correct) {
                this.scorecard.correct.push(card.id)
            } else {
                this.scorecard.incorrect.push(card.id)
            }
        },
        removeFromArray(value, array) {
            const index = array.indexOf(value);
            if (index > -1) {
                array.splice(index, 1);
            }
        },
        nextCard() {
            this.showAnswer = false
            this.activeIndex++
            if (this.activeIndex >= this.mutableCards.length) {
                this.results()
            }
        },
        previousCard() {
            this.activeIndex--
            if (this.activeIndex < 0) {
                this.activeIndex = 0
            } else {
                this.showAnswer = true
            }
        },
        results() {
            this.showResults = true
        },
        restart() {
            this.showResults = false
            this.showAnswer = false  
            this.activeIndex = 0
            this.correctCount = 0
            this.scorecard.correct = []
            this.scorecard.incorrect = []
            this.mutableCards = this.$root.shuffleArray(this.mutableCards)
        }
    }
}
</script>

<style scoped>
.card-body {
    height: 200px;
}
</style>
