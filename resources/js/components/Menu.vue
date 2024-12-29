<template>
  <div>
    <h3>Доступні сторінки</h3>
    <select v-model="selectedPage" @change="addItemToMenu('page')">
      <option value="">Виберіть сторінку</option>
      <option v-for="page in pages" :key="page.id" :value="page.id">
        {{ page.title }}
      </option>
    </select>

    <h3>Або виберіть пост</h3>
    <select v-model="selectedPost" @change="addItemToMenu('post')">
      <option value="">Виберіть пост</option>
      <option v-for="post in posts" :key="post.id" :value="post.id">
        {{ post.title }}
      </option>
    </select>

    <div>
      <h3>Або вкажіть кастомний URL</h3>
      <input type="text" v-model="customUrl" placeholder="Введіть кастомний URL" />
      <button @click="addItemToMenu('custom')">Додати кастомний URL</button>
    </div>

    <div>
      <h3>Меню</h3>
      <ul id="menu-structure" class="nestable">
        <li v-for="item in menuItems" :key="item.id">
          <input type="text" v-model="item.title" />
          <button @click="removeItem(item.id)">Видалити</button>
          <ul>
            <li v-for="child in item.children" :key="child.id">
              <input type="text" v-model="child.title" />
              <button @click="removeItem(child.id)">Видалити</button>
            </li>
          </ul>
        </li>
      </ul>
    </div>

    <button @click="saveMenu">Зберегти меню</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      pages: [], // Завантажені сторінки
      posts: [], // Завантажені пости
      selectedPage: '', // Вибрана сторінка
      selectedPost: '', // Вибраний пост
      customUrl: '', // Кастомна URL
      menuItems: [], // Поточне меню
    };
  },
  methods: {
    // Завантажуємо сторінки та пости
    loadData() {
      axios.get('/api/posts').then(response => {
        this.posts = response.data;
      });
      axios.get('/api/menu-items').then(response => {
        this.menuItems = response.data;
      });
    },

    // Додаємо новий елемент в меню
    addItemToMenu(type) {
      let newItem = {};

      if (type === 'page' && this.selectedPage) {
        const selectedPage = this.pages.find(page => page.id === this.selectedPage);
        newItem = {
          id: null,
          title: selectedPage.title,
          type: 'page',
          reference_id: selectedPage.id,
          url: selectedPage.url || '',
          parent_id: null,
        };
      } else if (type === 'post' && this.selectedPost) {
        const selectedPost = this.posts.find(post => post.id === this.selectedPost);
        newItem = {
          id: null,
          title: selectedPost.title,
          type: 'post',
          reference_id: selectedPost.id,
          url: selectedPost.url || '',
          parent_id: null,
        };
      } else if (type === 'custom' && this.customUrl) {
        newItem = {
          id: null,
          title: 'Custom Link',
          type: 'custom',
          reference_id: null,
          url: this.customUrl,
          parent_id: null,
        };
      }

      if (Object.keys(newItem).length > 0) {
        this.menuItems.push(newItem);
        this.clearSelection(); // Очищаємо вибір після додавання
      }
    },

    // Видаляємо елемент з меню
    removeItem(id) {
      this.menuItems = this.menuItems.filter(item => item.id !== id);
    },

    // Очищаємо поля після додавання
    clearSelection() {
      this.selectedPage = '';
      this.selectedPost = '';
      this.customUrl = '';
    },

    // Зберігаємо меню
    saveMenu() {
      axios.post('/api/menu-items', { items: this.menuItems })
          .then(response => {
            alert('Меню збережено');
          })
          .catch(error => {
            console.error(error);
          });
    },
  },
  created() {
    this.loadData();
  },
};
</script>
