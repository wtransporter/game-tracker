<template>
<div>
    <div class="flex space-x-1">
        <h3 class="flex items-center" :class="game.hscore > game.ascore ? 'text-black' : 'text-gray-600'">
            {{ hscore }} 
            <span class="text-xl w-6 pl-2" :class="game.hscore > game.ascore ? 'text-black' : 'text-white'">
                <svg v-show="isHome" aria-label="Winner" height="8" role="img" width="6">
                    <polygon fill="#000" points="6,0 6,8 0,4"></polygon>
                </svg>
            </span>
        </h3>
        <!-- <div v-if="!is_null(game.status) && game.status == 0  && Auth::check()"> -->
        <form v-show="formVisible" @submit.prevent="increaseScore('hscore')" 
                class="flex flex-col w-6 space-y-1">
            <button type="submit" class="h-4 w-4 border border-green-700 flex justify-center items-center">+</button>
        </form>
    </div>
    <div class="flex space-x-1">
        <h3 class="flex items-center" :class="game.hscore < game.ascore ? 'text-black' : 'text-gray-600'">
            {{ ascore }}
                <span class="text-xl w-6 pl-2" :class="game.hscore < game.ascore ? 'text-black' : 'text-white'">
                    <svg v-show="isAway" aria-label="Winner" height="8" role="img" width="6">
                        <polygon fill="#000" points="6,0 6,8 0,4"></polygon>
                    </svg>
                </span>
        </h3>
        <!-- @if (!is_null($game->status) && $game->status == 0 && Auth::check()) -->
        <form v-show="formVisible" @submit.prevent="increaseScore('ascore')"
                class="flex flex-col w-6 space-y-1">
            <button type="submit" class="h-4 w-4 border border-green-700 flex justify-center items-center">+</button>
        </form>
    </div>
</div>
</template>

<script>
export default {
    name: 'ScoreComponent',

    props: ['game', 'route'],

    data() {
        return {
            hscore: this.game.hscore,
            ascore: this.game.ascore,
        }
    },

    methods: {
        increaseScore(scorer) {
            let game = {
                [scorer]: 1,
                _method: "PATCH"
            };

            axios.post(this.route, game)
            .then((response) => {
                this[scorer]++;
            })
            .catch((error) => {
                flash(error.response.message, 'red');
            });
        },
    },

    computed: {
        isHome() {
            return this.game.hscore > this.game.ascore ? true : false;
        },

        isAway() {
            return this.game.hscore < this.game.ascore ? true : false;
        },

        formVisible() {
            return (!this.game.status && (this.game.status == 0));
        }
    },
}
</script>
