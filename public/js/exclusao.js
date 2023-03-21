function showConfirmationModal(userId) {
    const modal = new bootstrap.Modal(document.getElementById('confirmationModal'))
    const deleteButton = document.getElementById('deleteUserButton')
    deleteButton.onclick = () => {
      fetch(`/users/${userId}`, { method: 'DELETE' })
        .then(() => window.location.reload())
        .catch(error => console.error(error))
    }
    modal.show()
  }
