# Dashboard Note
WordPress Plugin — This plugin adds a simple, editable note widget to the WordPress admin dashboard to display custom documentation and production notes. It is ideal for reference information about CSS classes, dependencies, resources, production details, and other important data related to theme or WordPress installation.

## Features

- **Easy Editing:** Edit and save your notes directly from the dashboard without editing files.
- **Customizable Content:** Use basic HTML formatting to structure your notes as needed.
- **Secure Access:** Only users with appropriate permissions can edit the notes.
- **Enhanced Productivity:** Keep essential references and production information readily available.

## Installation

1. **Download the Plugin:**

   - Clone the repository or [download the ZIP file](#).

2. **Upload to WordPress:**

   - Upload the `dashboard-note` folder to the `/wp-content/plugins/` directory.

3. **Activate the Plugin:**

   - In your WordPress admin dashboard, navigate to **Plugins > Installed Plugins**.
   - Find **Dashboard Note** in the list and click **Activate**.

## Usage

1. **Access the Dashboard Note Widget:**

   - Go to your WordPress admin dashboard (**Dashboard > Home**).
   - Look for the yellow **Dashboard Note** widget.

2. **Editing the Note:**

   - Click the **Edit Note** button within the widget.
   - An inline form will appear, allowing you to edit the note content.
   - Enter your desired content in the textarea.
   - Click **Save Note** to save your changes.
   - The widget will return to view mode, displaying your updated note.
   - **Formatting the Note:** Use basic HTML tags to format your note (e.g., `<p>`, `<strong>`, `<em>`, `<ul>`, `<li>`).

## Customization

- **User Permissions:**

  - By default, only users with the `edit_dashboard` capability (typically administrators) can edit the note.
  - To change this, adjust the permission checks in the plugin code:

    ```php
    if ( isset( $_GET['edit_note'] ) && current_user_can( 'your_custom_capability' ) ) {
        // Your code here
    }
    ```


## Example Use Cases

- **Resource References:**

  - List important resources like style guides, documentation links, or asset URLs.

- **Production Notes:**

  - Record deployment procedures, server details, or maintenance schedules.

- **Team Communication:**

  - Provide reminders, to-do lists, or announcements for other administrators.

## Contributing

Contributions are welcome! Please follow these steps:

1. **Fork the Repository:**

   - Click the **Fork** button at the top right corner of the repository page.

2. **Clone Your Fork:**

   ```bash
   git clone https://github.com/your-username/dashboard-note.git
   ```

3. **Create a New Branch:**

   ```bash
   git checkout -b feature/your-feature-name
   ```

4. **Make Your Changes:**

   - Implement your feature or fix the issue.

5. **Commit Your Changes:**

   ```bash
   git commit -am 'Add some feature'
   ```

6. **Push to the Branch:**

   ```bash
   git push origin feature/your-feature-name
   ```

7. **Open a Pull Request:**

   - Go to your fork on GitHub and click the **Compare & pull request** button.

## License

This project is licensed under the [MIT License](LICENSE).

## Support

If you have any questions or need assistance, please open an issue in the repository or contact the author.

## Changelog

### Version .5

## Acknowledgments

- Created with the help of ChatGPT 


*This README provides all the necessary information to understand, install, and use the Dashboard Note plugin effectively. Feel free to customize it further to suit your needs.*
