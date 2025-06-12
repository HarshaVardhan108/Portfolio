// Import required modules
import express from "express";          // Web application framework
import { query, createContactsTable } from "./config/db.js";  // Database functions
import cors from "cors";                  // CORS middleware for cross-origin requests
import dotenv from "dotenv";              // Environment variables loader

// Initialize Express application
const app = express();

// Configure middleware
// Enable CORS for specific origins and methods
app.use(cors({
  origin: ['http://localhost:5501', 'http://127.0.0.2:5501'],
  methods: ['GET', 'POST', 'OPTIONS'],
  allowedHeaders: ['Content-Type', 'Authorization']
}));

// Handle preflight requests for contact endpoint
app.options("/api/contact", (req, res) => {
  res.header('Access-Control-Allow-Origin', '*');
  res.header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
  res.header('Access-Control-Allow-Headers', 'Content-Type');
  res.status(200).end();
});

// Parse incoming request bodies
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Load environment variables from .env file
dotenv.config();

// Initialize database connection and create required tables
(async () => {
  try {
    await createContactsTable();
    console.log('Database initialized successfully');
  } catch (error) {
    console.error('Failed to initialize database:', error);
    process.exit(1);  // Exit process if database initialization fails
  }
})();

// Contact form submission endpoint
// Handles POST requests to /api/contact
app.post("/api/contact", async (req, res) => {
  try {
    const { name, email, subject, message } = req.body;
    
    // Validate required fields
    if (!name || !email || !message) {
      return res.status(400).json({ 
        success: false, 
        message: 'Name, email, and message are required' 
      });
    }

    // Save contact information to database
    const result = await query(
      'INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)',
      [name, email, subject || 'No Subject', message]
    );

    // Log successful save and return success response
    console.log('Message saved to database:', { id: result.insertId, name, email });
    res.status(201).json({ 
      success: true, 
      message: "Message sent successfully!" 
    });
  } catch (error) {
    // Handle and log any errors
    console.error("Error saving contact:", error);
    res.status(500).json({ 
      message: "Error sending message" 
    });
  }
});

// Main server initialization function
async function initializeServer() {
  try {
    // Initialize database and create tables
    await createContactsTable();
    console.log('Database initialized successfully');

    // Start the server
    const PORT = process.env.PORT || 3000;  // Use environment variable or default to 3000

    // Create and start the server
    const server = app.listen(PORT, '0.0.0.0', () => {
      const host = server.address().address;
      const port = server.address().port;
      console.log(`Server is running at http://${host}:${port}`);
      console.log(`API Endpoint: http://${host}:${port}/api/contact`);
      console.log(`DB Test Endpoint: http://${host}:${port}/api/test-db`);
    });

    // Error handling
    // Handle port in use errors
    server.on('error', (error) => {
      if (error.code === 'EADDRINUSE') {
        console.error(`Port ${PORT} is already in use`);
      } else {
        console.error('Server error:', error);
      }
      process.exit(1);
    });

    // Handle unhandled promise rejections gracefully
    process.on('unhandledRejection', (err) => {
      console.error('Unhandled Rejection:', err);
      server.close(() => process.exit(1));
    });
  } catch (error) {
    console.error('Failed to initialize server:', error);
    process.exit(1);
  }
}

// Start the server initialization process
initializeServer();
