import express from "express";
import { query, createContactsTable } from "./config/db.js";
import cors from "cors";
import dotenv from "dotenv";

const app = express();

// Middleware
app.use(cors({
  origin: ['http://localhost:5501', 'http://127.0.0.2:5501'],
  methods: ['GET', 'POST', 'OPTIONS'],
  allowedHeaders: ['Content-Type', 'Authorization']
}));

app.options("/api/contact", (req, res) => {
  res.header('Access-Control-Allow-Origin', '*');
  res.header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
  res.header('Access-Control-Allow-Headers', 'Content-Type');
  res.status(200).end();
});

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Load environment variables
dotenv.config();

// Initialize database and create tables
(async () => {
  try {
    await createContactsTable();
    console.log('Database initialized');
  } catch (error) {
    console.error('Failed to initialize database:', error);
    process.exit(1);
  }
})();

// POST endpoint for contact form
app.post("/api/contact", async (req, res) => {
  try {
    const { name, email, subject, message } = req.body;
    
    // Basic validation
    if (!name || !email || !message) {
      return res.status(400).json({ success: false, message: 'Name, email, and message are required' });
    }

    // Insert into database
    const result = await query(
      'INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)',
      [name, email, subject || 'No Subject', message]
    );

    console.log('Message saved to database:', { id: result.insertId, name, email });
    res.status(201).json({ success: true, message: "Message sent successfully!" });
  } catch (error) {
    console.error("Error saving contact:", error);
    res.status(500).json({ message: "Error sending message" });
  }
});

// Initialize database before starting server
async function initializeServer() {
  try {
    // Initialize database and create tables
    await createContactsTable();
    console.log('Database initialized successfully');

    // Start the server
    const PORT = process.env.PORT || 3000;

    // Create a server instance
    const server = app.listen(PORT, '0.0.0.0', () => {
      const host = server.address().address;
      const port = server.address().port;
      console.log(`Server is running at http://${host}:${port}`);
      console.log(`API Endpoint: http://${host}:${port}/api/contact`);
      console.log(`DB Test Endpoint: http://${host}:${port}/api/test-db`);
    });

    // Handle server errors
    server.on('error', (error) => {
      if (error.code === 'EADDRINUSE') {
        console.error(`Port ${PORT} is already in use`);
      } else {
        console.error('Server error:', error);
      }
      process.exit(1);
    });

    // Handle unhandled promise rejections
    process.on('unhandledRejection', (err) => {
      console.error('Unhandled Rejection:', err);
      server.close(() => process.exit(1));
    });
  } catch (error) {
    console.error('Failed to initialize server:', error);
    process.exit(1);
  }
}

// Start the server
initializeServer();
