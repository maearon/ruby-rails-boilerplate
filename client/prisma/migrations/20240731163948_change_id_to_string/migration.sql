-- AlterTable
ALTER TABLE "microposts" ALTER COLUMN "user_id" SET DATA TYPE TEXT;

-- AlterTable
ALTER TABLE "relationships" ALTER COLUMN "follower_id" SET DATA TYPE TEXT,
ALTER COLUMN "followed_id" SET DATA TYPE TEXT;

-- AddForeignKey
ALTER TABLE "microposts" ADD CONSTRAINT "fk_rails_558c81314b" FOREIGN KEY ("user_id") REFERENCES "users"("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
