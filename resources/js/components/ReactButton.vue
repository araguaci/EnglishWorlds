<template>
  <div>
    <div class="actionBox ui large label">React</div>
    <div class="ui popup">
      <div class="emoji-reactions">
        <span data-tooltip="Like" data-inverted @click="react('like')">
          <i class="thumbs up icon"></i>
        </span>
        <span data-tooltip="Dislike" data-inverted>
          <i class="thumbs down icon"></i>
        </span>
        <span data-tooltip="Love" data-inverted>
          <i class="heart icon"></i>
        </span>
        <span data-tooltip="Hate" data-inverted>
          <i class="heartbeat icon"></i>
        </span>
        <span data-tooltip="Haha" data-inverted>
          <i class="smile icon"></i>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    react(reacttion) {
      axios.post('/react', {reaction_type: reacttion})
           .then(response => console.log(response.data))
    }
  },
  mounted() {
    $(".actionBox").popup({
      inline: true,
      hoverable: true,
      position: 'top center',
      transition: 'fade up',
      delay: {
        show: 300,
        hide: 800
      }
    });
  }
};
</script>

<style scoped>
.actionBox {
  cursor: pointer;
}

.popup {
  margin-bottom: 1px !important;
  border-radius: 70px;
  width: fit-content;
  box-shadow: 0 8px 2px -6px rgba(0, 0, 0, 0.29);
}

.popup::before {
  display: none;
}

.emoji-reactions span i {
  transition: transform 500ms ease;
  animation-timing-function: linear;
  backface-visibility: hidden;
  cursor: pointer;
  animation-iteration-count: infinite;
}

.emoji-reactions span[data-tooltip=Like]:hover i {
  transform: scale(1.2, 1.2) rotate(-45deg);
}

.emoji-reactions span[data-tooltip=Dislike]:hover i {
  transform: scale(1.2, 1.2) rotate(45deg);
}

.emoji-reactions span[data-tooltip=Love]:hover i {
  transform: scale(2, 2) rotate(360deg);
}

.emoji-reactions span[data-tooltip=Hate]:hover i {
  transform: scale(2, 1) rotate(180deg);
}
</style>
