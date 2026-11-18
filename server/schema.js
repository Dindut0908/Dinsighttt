// Table definitions. Column lists double as a whitelist for the generic REST API.
const ts = {
  created_at: 'DATETIME DEFAULT CURRENT_TIMESTAMP',
  updated_at: 'DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
};

export const tables = {
  projects: {
    title: 'VARCHAR(255) NOT NULL', slug: 'VARCHAR(255) UNIQUE', description: 'TEXT NOT NULL',
    image: 'VARCHAR(500)', demo_link: 'VARCHAR(500)', repo_link: 'VARCHAR(500)', tech_stack: 'TEXT',
  },
  skills: {
    title: 'VARCHAR(255) NOT NULL', icon: 'VARCHAR(255)', percentage: 'INT DEFAULT 0',
    category: "VARCHAR(100) DEFAULT 'Technical'",
  },
  experiences: {
    position: 'VARCHAR(255) NOT NULL', organization: 'VARCHAR(255) NOT NULL', period: 'VARCHAR(255) NOT NULL',
    description: 'TEXT', image: 'VARCHAR(500)', is_active: 'TINYINT(1) DEFAULT 1',
  },
  certificates: {
    name: 'VARCHAR(255) NOT NULL', issuer: 'VARCHAR(255) NOT NULL', issued_date: 'DATE',
    image: 'VARCHAR(500)', credential_url: 'VARCHAR(500)',
  },
  blogs: {
    title: 'VARCHAR(255) NOT NULL', slug: 'VARCHAR(255) UNIQUE', content: 'LONGTEXT NOT NULL',
    thumbnail: 'VARCHAR(500)', excerpt: 'TEXT', published_at: 'DATE', is_published: 'TINYINT(1) DEFAULT 1',
  },
  guestbooks: {
    name: 'VARCHAR(255) NOT NULL', email: 'VARCHAR(255)', message: 'TEXT NOT NULL',
    is_approved: 'TINYINT(1) NOT NULL DEFAULT 0', ip_address: 'VARCHAR(64)',
  },
  abouts: {
    fullname: 'VARCHAR(255)', email: 'VARCHAR(255)', phone: 'VARCHAR(100)', education: 'VARCHAR(255)',
    address: 'TEXT', description: 'TEXT', photo: 'VARCHAR(500)',
  },
  education: {
    school: 'VARCHAR(255) NOT NULL', major: 'VARCHAR(255) NOT NULL', year: 'VARCHAR(100) NOT NULL', description: 'TEXT',
  },
  homes: {},
};

// Public read rules: SQL appended for non-admin SELECT.
export const publicRead = {
  projects: '', skills: '', certificates: '', abouts: '', education: '', homes: '',
  experiences: 'is_active = 1', blogs: 'is_published = 1', guestbooks: 'is_approved = 1',
};

export const boolCols = new Set(['is_active', 'is_published', 'is_approved']);

export function ddl() {
  const stmts = Object.entries(tables).map(([name, cols]) => {
    const defs = ['id CHAR(36) PRIMARY KEY', ...Object.entries(cols).map(([c, t]) => `${c} ${t}`),
      `created_at ${ts.created_at}`, `updated_at ${ts.updated_at}`];
    return `CREATE TABLE IF NOT EXISTS ${name} (${defs.join(', ')}) CHARACTER SET utf8mb4`;
  });
  stmts.push(`CREATE TABLE IF NOT EXISTS users (id CHAR(36) PRIMARY KEY, name VARCHAR(255), email VARCHAR(255) UNIQUE NOT NULL, password_hash VARCHAR(255) NOT NULL, role VARCHAR(20) NOT NULL DEFAULT 'admin', created_at DATETIME DEFAULT CURRENT_TIMESTAMP) CHARACTER SET utf8mb4`);
  stmts.push(`CREATE TABLE IF NOT EXISTS files (path VARCHAR(500) PRIMARY KEY, mime VARCHAR(100) NOT NULL, data LONGBLOB NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP) CHARACTER SET utf8mb4`);
  return stmts;
}
