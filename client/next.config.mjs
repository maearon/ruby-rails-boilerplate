import path from 'path';
import { fileURLToPath } from 'url';

// Fix for ES modules
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

/** @type {import('next').NextConfig} */
const nextConfig = {
  experimental: {
    staleTimes: {
      dynamic: 30,
    },
  },
  // serverExternalPackages: ["@node-rs/argon2"],
  images: {
    domains: [
      'localhost', 
      'ruby-rails-boilerplate.vercel.app',
      'ruby-rails-boilerplate-h3xkxjxom-maearons-projects.vercel.app'
    ],
    remotePatterns: [
      {
        protocol: 'https',
        hostname: 'secure.gravatar.com',
        port: '',
        pathname: '/avatar/**',
      },
      {
        protocol: 'http',
        hostname: 'localhost:3001',
        port: '',
        pathname: '/**',
      },
      {
        protocol: 'https',
        hostname: 'youtube.com',
        port: '',
        pathname: '/**',
      },
      {
        protocol: 'https',
        hostname: 'via.placeholder.com',
        port: '',
        pathname: '/**',
      },
      {
        protocol: 'https',
        hostname: 'ruby-rails-boilerplate-3s9t.onrender.com',
        port: '',
        pathname: '/**',
      },
      {
        protocol: 'https',
        hostname: 'utfs.io',
        port: '',
        pathname: `/a/${process.env.NEXT_PUBLIC_UPLOADTHING_APP_ID}/*`,
      },
    ],
  },
  env: {
    POSTGRES_URL: process.env.POSTGRES_URL,
    POSTGRES_PRISMA_URL: process.env.POSTGRES_PRISMA_URL,
    POSTGRES_URL_NO_SSL: process.env.POSTGRES_URL_NO_SSL,
    POSTGRES_URL_NON_POOLING: process.env.POSTGRES_URL_NON_POOLING,
    POSTGRES_USER: process.env.POSTGRES_USER,
    POSTGRES_HOST: process.env.POSTGRES_HOST,
    POSTGRES_PASSWORD: process.env.POSTGRES_PASSWORD,
    POSTGRES_DATABASE: process.env.POSTGRES_DATABASE,
    GOOGLE_CLIENT_ID: process.env.GOOGLE_CLIENT_ID,
    GOOGLE_CLIENT_SECRET: process.env.GOOGLE_CLIENT_SECRET,
    UPLOADTHING_SECRET: process.env.UPLOADTHING_SECRET,
    NEXT_PUBLIC_UPLOADTHING_APP_ID: process.env.NEXT_PUBLIC_UPLOADTHING_APP_ID,
    NEXT_PUBLIC_STREAM_KEY: process.env.NEXT_PUBLIC_STREAM_KEY,
    STREAM_SECRET: process.env.STREAM_SECRET,
    CRON_SECRET: process.env.CRON_SECRET,
    NEXT_PUBLIC_BASE_URL_LOCAL: process.env.NEXT_PUBLIC_BASE_URL_LOCAL,
    NEXT_PUBLIC_BASE_URL: process.env.NEXT_PUBLIC_BASE_URL,
  },
  rewrites: () => {
    return [
      {
        source: "/hashtag/:tag",
        destination: "/search?q=%23:tag",
      },
    ];
  },
  webpack: (config, { isServer }) => {
    // Add a rule for .node files
    config.module.rules.push({
      test: /\.node$/,
      use: 'file-loader',
    });

    // Ensure proper handling of node-rs/argon2 binaries
    config.resolve.alias['@node-rs/argon2'] = path.resolve(__dirname, 'node_modules/@node-rs/argon2');

    return config;
  },
};

export default nextConfig;
