module.exports = {
  proxy: "localhost:8000/",
  notify: true,
  files: ["./css/*.min.css", "./js/*.min.js", "./**/*.php"],
  browser: ["google chrome", "firefox", "safari"],
  notify: true,
};
