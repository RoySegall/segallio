import styles from './page.module.scss';
import {Menu} from "@/Components/Menu";
import {Introduction} from "@/Components/Introduction";
import {Jobs} from "@/Components/Jobs";
import {BlogPosts} from "@/Components/BlogPosts";

export default function Home() {
    return <div className={styles.home}>
        <Menu />
        <Introduction />
        <Jobs />
        <BlogPosts />
    </div>;
}
