import styles from './BlogPosts.module.scss';
import {robotoMono} from "@/common/fonts";

const BlogPost = () => <div className={styles.blog}>
    <div>
        <span className={`${styles.title} ${robotoMono.className}`}>Why I love pizza</span>
        <div className={styles.metadata}>
            <span className={styles.source}>Italiza, </span>
            <span className={styles.date}>2022-06-25</span>
        </div>
    </div>
    <p>
        I just finished up my two years of work in Dreamed Diabetes. I won’t go into what they do (since their website
        is pretty cool), but I would describe how it feels to be a med-teach company developer.
    </p>
</div>

export const BlogPosts = () => <div className={styles.blogsPostsWrapper}>
    <div className={`${styles.blogs} ${robotoMono.className}`}>
        <h2>Blog posts</h2>

        <div className={styles.blogsWrapper}>
            <BlogPost />
            <BlogPost />
            <BlogPost />
            <BlogPost />
            <BlogPost />
            <BlogPost />
            <BlogPost />
            <BlogPost />
            <BlogPost />
            <BlogPost />
            <BlogPost />
            <BlogPost />
        </div>
    </div>
</div>
