import styles from './page.module.scss';
import {Introduction} from "@/Components/Introduction";
import {Jobs} from "@/Components/Jobs";
import {BlogPosts} from "@/Components/BlogPosts";

export default function Home() {
    return <div className={styles.home}>
        <Introduction />
        <Jobs />
        <BlogPosts />
    </div>;
}
