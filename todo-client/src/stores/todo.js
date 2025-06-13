import { defineStore } from "pinia";

export const useTodoStore = defineStore("todo", {
  state: () => ({
    todos: [],
  }),

  getters: {
    countTodos: (state) => 
      state.todos.filter((todo) => todo.completedAt === null).length,
  },

  actions: {
    /**
     * Fetches all todos from the backend and updates the store.
     */
    async fetchTodos() {
      try {
        const response = await fetch("http://localhost:3100/tasks");
        if (!response.ok) throw new Error("Failed to fetch todos");

        this.todos = await response.json();
      } catch (error) {
        console.error("Error fetching todos:", error);
        // Optionally dispatch a notification or error message
      }
    },

    /**
     * Toggles the status of a todo between 'done' and 'pending'.
     * @param id - ID of the todo to toggle
     */
    async toggleStatus(id) {
      const todo = this.todos.find((t) => t.id === id);
      if (!todo) return;

      const isCompleted = todo.completedAt !== null;
      const endpoint = isCompleted ? "pending" : "done";

      try {
        const response = await fetch(`http://localhost:3100/tasks/${id}/${endpoint}`, {
          method: "PATCH",
        });

        if (!response.ok) throw new Error(`Failed to mark task as ${endpoint}`);

        const updatedTodo = await response.json();
        const index = this.todos.findIndex((t) => t.id === id);

        if (index !== -1) {
          this.todos[index] = updatedTodo;
        }
      } catch (error) {
        console.error("Error toggling todo status:", error);
        // Optionally revert optimistic UI changes
      }
    },

    /**
     * Adds a new todo to the backend and updates the store.
     * @param name - Name of the new todo
     */
    async addTodo(name) {
      try {
        const response = await fetch("http://localhost:3100/tasks", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ name, description: "description" }),
        });

        if (!response.ok) throw new Error("Failed to add todo");

        const newTodo = await response.json();
        this.todos.push(newTodo);
      } catch (error) {
        console.error("Error adding todo:", error);
      }
    },

    /**
     * Deletes a single todo from the backend and updates the store.
     * @param id - ID of the todo to delete
     */
    async deleteTodo(id) {
      try {
        const response = await fetch(`http://localhost:3100/tasks/${id}`, {
          method: "DELETE",
        });

        if (!response.ok) throw new Error("Failed to delete todo");

        this.todos = this.todos.filter((todo) => todo.id !== id);
      } catch (error) {
        console.error("Error deleting todo:", error);
      }
    },

    /**
     * Deletes all todos from the backend and clears the store.
     * Note: This implementation deletes each todo individually.
     */
    async clearAll() {
      try {
        // Delete each todo individually
        await Promise.all(
          this.todos.map((todo) =>
            fetch(`http://localhost:3100/tasks/${todo.id}`, {
              method: "DELETE",
            })
          )
        );

        this.todos = [];
      } catch (error) {
        console.error("Error clearing todos:", error);
      }
    },
  },
});