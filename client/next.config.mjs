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
  serverExternalPackages: ["@node-rs/argon2"],
  images: {
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
        protocol: "https",
        hostname: "utfs.io",
        pathname: `/a/${process.env.NEXT_PUBLIC_UPLOADTHING_APP_ID}/*`,
      },
    ],
  },
  env: {
    CLIENT_ID: process.env.CLIENT_ID,
    REDIRECT_URI: process.env.REDIRECT_URI,
    SCOPE: process.env.SCOPE,
    CLIENT_SECRET: process.env.CLIENT_SECRET,
    API_KEY: process.env.API_KEY,
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
