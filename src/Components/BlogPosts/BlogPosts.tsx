import styles from './BlogPosts.module.scss';
import {robotoMono} from "@/common/fonts";
import {BlogPost, blogs} from "@/Components/BlogPosts/Blogs";
import {FontAwesomeIcon} from '@fortawesome/react-fontawesome'
import {faQuoteLeft, faQuoteRight} from '@fortawesome/free-solid-svg-icons';
import type {FC} from "react";

const BlogPost: FC<BlogPost> = ({url, source,title, paragraph, date}) => <div className={styles.blog}>
        <div className={styles.first}>
            <FontAwesomeIcon icon={faQuoteLeft} className={`${styles.quote}`} />
        </div>

        <div className={styles.second}>
            <div className={styles.top}>
                <span className={`${styles.title} ${robotoMono.className}`}><a href={url} target={'_blank'}>{title}</a></span>
            </div>
            <div className={styles.paragraphWrapper}>
                <p>{paragraph}</p>
            </div>
            <div className={styles.metadata}>
                <span className={styles.source}>{source}, </span>
                <span className={styles.date}>{date}</span>
            </div>
        </div>

        <div className={styles.third}>
            <FontAwesomeIcon icon={faQuoteRight} className={`${styles.quote} ${styles.right}`} />
        </div>
</div>

export const BlogPosts = () => <div className={styles.blogsPostsWrapper}>
    <div className={`${styles.blogs} ${robotoMono.className}`} id="blogs">
        <h2>Blog posts</h2>

        <div className={styles.blogsScroller}>
            <div className={styles.blogsWrapper}>
                {blogs.map((blog, index) => <BlogPost key={index} {...blog} />)}
            </div>
        </div>
    </div>
</div>
