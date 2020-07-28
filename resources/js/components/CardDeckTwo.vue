<template>
    <div>
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
                            nextCard()
                        "
                        class="btn btn-success flex-fill mr-3"
                    >
                        Correct
                    </button>
                    <button
                        @click="nextCard()"
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
    </div>
</template>

<script>
export default {
    props: ['cards'],
    data() {
        return {
            mutableCards: this.cards,
            activeIndex: 0,
            showAnswer: false,
            showResults: false,
            correctCount: 0
        }
    },
    computed: {
        activeCard: function() {
            return this.mutableCards[this.activeIndex]
        }
    },
    methods: {
        nextCard() {
            this.showAnswer = false
            this.activeIndex++
            if (this.activeIndex >= this.mutableCards.length) {
                this.results()
            }
        },
        results() {
            this.showResults = true
        },
        restart() {
            this.showResults = false
            this.activeIndex = 0
            this.correctCount = 0
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
