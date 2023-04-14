-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 02:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) UNSIGNED NOT NULL,
  `ctitle` varchar(50) NOT NULL,
  `cdescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `ctitle`, `cdescription`) VALUES
(10, 'wild', 'wild animals are tiger, lion'),
(12, 'art', 'the activity or skill of producing things such as paintings, designs, etc.; the objects that are produced'),
(14, 'uncategorized', 'this is an uncatagorized'),
(15, 'software', 'Software is a set of instructions, data or programs used to operate computers and execute specific tasks'),
(16, 'Technologies', 'Technology refers to the tools, techniques, and methods used to create, develop, and improve products and services. It involves the application of scientific knowledge for practical purposes, such as the creation of new products or the improvement of existing ones. Technology has been an important driver of human progress, enabling us to achieve new levels of productivity, efficiency, and innovation'),
(17, 'Nutrition and health', 'Nutrition and health are closely linked, as a balanced diet that includes a variety of nutrients is essential for maintaining good health and preventing chronic diseases. Poor nutrition can lead to malnutrition, obesity, and a range of health problems, including heart disease, diabetes, and cancer.'),
(18, 'Botany and gardening', 'Botany and gardening involve the study and cultivation of plants, including their growth habits, reproduction, and environmental needs. Gardening is not only a hobby but also provides numerous benefits, such as enhancing mental well-being, improving air quality, and promoting healthy eating habits.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `Name`, `Email`, `Message`) VALUES
(1, 'soumya', 'soumayadipsaha2002@gmail.com', 'hello'),
(2, 'Sujit Saha', 'prodipta48@gmail.com', 'hello how are you'),
(3, 'anu', 'anu@gmail.com', 'your content is awsome'),
(4, 'Sujit Saha', 'anu@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `tbody` text NOT NULL,
  `thumbnil` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `tbody`, `thumbnil`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(8, 'Lizards', '<p>Lizards are fascinating creatures that are found in a wide range of environments, from deserts to rainforests. They belong to the class Reptilia and are known for their scaly skin, four legs, and long tails. With over 6,000 species, lizards are a diverse group of animals that come in various shapes and sizes.</p>\r\n<p>One of the most unique features of lizards is their ability to adapt to different environments. Some species, like the chameleon, have the ability to change color to blend in with their surroundings. Other species, like the gecko, have specialized toe pads that allow them to climb walls and even walk on ceilings.</p>\r\n<p>Lizards are also known for their incredible regenerative abilities. Many species have the ability to regenerate lost limbs or tails, which can come in handy when escaping from predators or defending their territory.</p>\r\n<p>Despite their fearsome appearance, lizards play important roles in their ecosystems. They serve as predators, prey, and even seed dispersers. Many species, like the bearded dragon, are kept as pets and are popular among reptile enthusiasts.</p>\r\n<p>However, some species of lizards are threatened due to habitat loss and other environmental factors. It is important to protect their habitats and prevent their extinction.</p>\r\n<p>In conclusion, lizards are an incredibly diverse group of animals that have unique and fascinating adaptations. Their ability to thrive in different environments and their important roles in their ecosystems make them an important part of our natural world.</p>', 'blog3.jpg', '2023-04-11 15:59:59', 10, 14, 0),
(10, 'Robotics', 'Robotics is a rapidly advancing field of technology that deals with the design, construction, and operation of robots. Robots are machines that can perform tasks automatically, with or without human intervention. They can be programmed to perform a wide range of functions, from simple household chores to complex manufacturing processes.\r\n\r\nThe field of robotics has come a long way since its inception in the mid-twentieth century. Today, robots are used in a wide range of industries, including healthcare, manufacturing, and transportation. They are also used in space exploration, military operations, and search and rescue missions.\r\n\r\nOne of the most significant advantages of robots is their ability to perform tasks that are too dangerous, difficult, or time-consuming for humans. For example, robots can be used to explore deep sea environments, to defuse bombs, and to perform surgery. They can also be used to automate repetitive tasks in manufacturing, such as assembly line work.\r\n\r\nRobots come in all shapes and sizes, from tiny nanobots to massive industrial machines. They can be controlled remotely or programmed to operate autonomously. They can also be equipped with a variety of sensors, such as cameras, microphones, and touch sensors, that allow them to perceive their environment and interact with it.\r\n\r\nDespite the many benefits of robots, there are also concerns about their impact on society. Some worry that robots could replace human workers in certain industries, leading to job losses and economic disruption. Others are concerned about the potential for robots to be used in harmful ways, such as in warfare or surveillance.\r\n\r\nDespite these concerns, the field of robotics is likely to continue to grow and evolve in the coming years. As robots become more sophisticated and capable, they are likely to play an increasingly important role in many areas of our lives.\r\n', 'blog15.jpg', '2023-04-11 17:54:43', 16, 1, 0),
(12, 'Best python online compiler in 2023', '<p style=\"text-align: justify;\">Python is a popular high-level programming language. Python is a commonly used programming language that can be found in various applications across different industries. This article provides explanations for some of the best Python online compilers for beginners and advanced programmers alike. From this article, you can know about some best python online compilers.</p>\r\n<h2 class=\"wp-block-heading\"><strong>What is a compiler</strong></h2>\r\n<p style=\"text-align: justify;\">In a computer system, the compiler is a computer program that translates computer code written in one programming language into another. It converts high-level language (source code written in a programming language) to low-level language (machine code) to execute the program. The compiler has a few phases, lexical analysis, which scans the source code and generates tokens; syntax analysis, which takes the tokens as input, parses them and generates a parse tree; semantic analysis, which checks incompatible data types; intermediate code generation, which generates code with three addresses; code optimization, which removes unnecessary code and increases execution time; and code generator, which maps the optimized code to the target machine code. The source code passes through the above stages and generates output.</p>\r\n<h2 class=\"wp-block-heading\"><strong>What is the difference between a compiler and an interpreter?</strong></h2>\r\n<ol>\r\n<li>The compiler is fast since it scans the whole source code only once but an interpreter is slow since it scans the source code line by line.</li>\r\n<li>The interpreter is slow compared to the compiler.</li>\r\n<li>The compiler checks both syntactical and semantic errors but the interpreter checks only syntactic errors. Interpreters are often smaller as compared to compilers.</li>\r\n<li>Interpreter flexible which a compiler is not.</li>\r\n<li>The compiler is more efficient than the interpreter.</li>\r\n<li>The compiler is more efficient than the interpreter.</li>\r\n<li>The compiler makes directly executable files that can run directly on the CPU but the interpreter doesn&rsquo;t create a directly executable file.</li>\r\n<li>The compiler is used by C, and C++ programming languages and the interpreter is used by programming languages such as java.</li>\r\n</ol>\r\n<h2 class=\"wp-block-heading\"><strong>How does the Python online compiler compare to local Python compilers?</strong></h2>\r\n<h4 class=\"wp-block-heading\">Online Python Compiler</h4>\r\n<p>The python online compiler converts a coding system written in the python programming language into a lower-level language and produces executable code. Hosted on a server, python online compilers are accessible to buyers through websites. These Python online compilers use websites to get Python code and programming language as input. The server should analyze the compilation results before issuing them to the buyer who requested the compilation. There are some workflows of online Python compilers</p>\r\n<ul>\r\n<li>The Python code is written with the code editor on the website.</li>\r\n<li>The code is sent from the website to the server.</li>\r\n<li>The content is saved on the server as a file.</li>\r\n<li>The file is processed like a local source file.</li>\r\n<li>The result is computed and returned to the website.</li>\r\n</ul>\r\n<h4 class=\"wp-block-heading\">Local Python Compiler</h4>\r\n<p>For the local Python compiler, we must first install Python on our computer system. The local Python compilation process can divide into two steps.</p>\r\n<ul>\r\n<li>In the first step, the Python file, which is stored with the extension &ldquo;.py&rdquo; and in which the code is written according to the Python programming language, goes through an assembler to create an object.</li>\r\n<li>In the second step, the object program passes through the interpreter to generate machine code and is then executed.</li>\r\n</ul>\r\n<p><img src=\"https://wanderwithcode.com/wp-content/uploads/2022/12/local-1.png\" alt=\"working procedure of local python compiler\" width=\"469\" height=\"346\"></p>\r\n<h2 class=\"wp-block-heading\"><strong>What are the benefits of using the Python online compiler?</strong></h2>\r\n<p>There are some benefits of using an online python compiler</p>\r\n<ul>\r\n<li>There is no need to download python software</li>\r\n<li>No setup is needed for compiling python source code</li>\r\n<li>No need for any configuration</li>\r\n<li>No need for any administration</li>\r\n<li>It can access from any location</li>\r\n<li>There are no hardware restrictions</li>\r\n<li>Collaboration is possible in online python compiler</li>\r\n</ul>\r\n<h2 class=\"wp-block-heading\"><strong>What are some of the best Python online compilers?</strong></h2>\r\n<p>There are many online Python compilers available. We distinguish these online Python compilers according to beginners and advanced users. We have selected some of the best online compilers based on their various features, execution times, user interfaces, etc.</p>\r\n<h3 class=\"wp-block-heading\"><strong>Best python online compilers for beginners</strong></h3>\r\n<p>In this section, we have selected some of the best online compilers for beginners who have just started learning Python and using loops, operators, lists, etc. It can also use in other programming languages like C, C++, Java, etc.</p>\r\n<h4 class=\"wp-block-heading\"><a href=\"https://www.programiz.com/python-programming/online-compiler/\">Programiz</a></h4>\r\n<p>Programiz is an application that can use to compile Python programs. We can use it online in our browser. Many programmers use this online compiler to compile Python code.</p>\r\n<p><img src=\"https://wanderwithcode.com/wp-content/uploads/2022/12/programmiz-1024x453.png\" alt=\"Programiz python compiler\" width=\"450\" height=\"199\"></p>\r\n<ul>\r\n<li><strong>Price:&nbsp;</strong>Free</li>\r\n<li><strong>Developed By:</strong>&nbsp;Guido van Rossum</li>\r\n<li><strong>Platform Supported:</strong>&nbsp;Linux, Windows, Mac</li>\r\n<li><strong>Language Supported:</strong>&nbsp;English</li>\r\n</ul>\r\n<p><strong><mark class=\"has-inline-color has-black-color\">Features</mark></strong></p>\r\n<ul>\r\n<li>Simple and easy to understand</li>\r\n<li>Open source doesn&rsquo;t need to pay for use</li>\r\n<li>High-level interpreted language</li>\r\n<li>Flexible, immerse, extending</li>\r\n<li>Can be used on mobile phone</li>\r\n<li>No need to install the application</li>\r\n<li>Use from a web browser</li>\r\n</ul>\r\n<h4 class=\"wp-block-heading\"><a href=\"https://www.onlinegdb.com/online_python_compiler\">Online GDB</a></h4>\r\n<p>Online gdb is a free compiler that allows programmers to write and run basic python programs. It supports 30 programming languages including python, C, C++, Java, Bash, etc.</p>\r\n<figure class=\"wp-block-image size-large\"><img class=\"wp-image-1364\" src=\"https://wanderwithcode.com/wp-content/uploads/2022/12/gdb-1024x479.png\" sizes=\"(max-width: 1024px) 100vw, 1024px\" srcset=\"https://wanderwithcode.com/wp-content/uploads/2022/12/gdb-1024x479.png 1024w, https://wanderwithcode.com/wp-content/uploads/2022/12/gdb-300x140.png 300w, https://wanderwithcode.com/wp-content/uploads/2022/12/gdb-768x359.png 768w, https://wanderwithcode.com/wp-content/uploads/2022/12/gdb-150x70.png 150w, https://wanderwithcode.com/wp-content/uploads/2022/12/gdb.png 1364w\" alt=\"Online GDB Compiler\" width=\"1024\" height=\"479\" loading=\"lazy\">\r\n<figcaption class=\"wp-element-caption\"><strong>Online GDB Compiler</strong></figcaption>\r\n</figure>\r\n<ul>\r\n<li><strong>Price:&nbsp;</strong>Free</li>\r\n<li><strong>Developed By:</strong>&nbsp;GNU Project</li>\r\n<li><strong>Platform Supported:</strong>&nbsp;Linux, Windows, Mac</li>\r\n<li><strong>Language Supported:</strong>&nbsp;English</li>\r\n</ul>\r\n<p><strong><mark class=\"has-inline-color has-black-color\">Features</mark></strong></p>\r\n<ul>\r\n<li>Simple and easy to understand</li>\r\n<li>Open source doesn&rsquo;t need to pay for use</li>\r\n<li>High-level interpreted language</li>\r\n<li>Flexible, immerse, extending</li>\r\n<li>Can be used on mobile phone</li>\r\n<li>No need to install the application</li>\r\n<li>Use from a web browser</li>\r\n<li>Supports 30+ programming language</li>\r\n<li>Execution speed is fast</li>\r\n</ul>\r\n<h4 class=\"wp-block-heading\"><a href=\"https://www.tutorialspoint.com/online_python_compiler.php\">Tutorials Point</a></h4>\r\n<p>Tutorials point is a free compiler that allows programmers to write and run basic python programs. It also supports running other programming languages like Java, C, C++, bash, etc.</p>\r\n<figure class=\"wp-block-image size-large\"><img class=\"wp-image-1380\" src=\"https://wanderwithcode.com/wp-content/uploads/2022/12/tutorials-point-1024x516.png\" sizes=\"(max-width: 1024px) 100vw, 1024px\" srcset=\"https://wanderwithcode.com/wp-content/uploads/2022/12/tutorials-point-1024x516.png 1024w, https://wanderwithcode.com/wp-content/uploads/2022/12/tutorials-point-300x151.png 300w, https://wanderwithcode.com/wp-content/uploads/2022/12/tutorials-point-768x387.png 768w, https://wanderwithcode.com/wp-content/uploads/2022/12/tutorials-point-150x76.png 150w, https://wanderwithcode.com/wp-content/uploads/2022/12/tutorials-point.png 1239w\" alt=\"Tutorials Point online compiler\" width=\"1024\" height=\"516\" loading=\"lazy\">\r\n<figcaption class=\"wp-element-caption\"><strong>Tutorials Point online compiler</strong></figcaption>\r\n</figure>\r\n<ul>\r\n<li><strong>Price:&nbsp;</strong>Free</li>\r\n<li><strong>Platform Supported:</strong>&nbsp;Linux, Windows, Mac</li>\r\n<li><strong>Language Supported:</strong>&nbsp;English</li>\r\n</ul>\r\n<p><strong><mark class=\"has-inline-color has-black-color\">Features</mark></strong></p>\r\n<ul>\r\n<li>Simple and easy to understand</li>\r\n<li>Open source doesn&rsquo;t need to pay for use</li>\r\n<li>High-level interpreted language</li>\r\n<li>Flexible, immerse, extending</li>\r\n<li>Can be used on mobile phone</li>\r\n<li>No need to install the application</li>\r\n<li>Use from a web browser</li>\r\n</ul>\r\n<h3 class=\"wp-block-heading\"><strong>Best python online compilers for advanced users</strong></h3>\r\n<p>In this section, we have selected some of the best online compilers for an advanced programmer who uses a different library like NumPy, Matplotlib, pandas, etc.</p>\r\n<h3 class=\"wp-block-heading\"><a href=\"https://replit.com/new/python3\">Replit</a></h3>\r\n<p>Replit is an online compiler that serves as a compiler, IDE, and interpreter. It helps the user to write and debug advanced python code that contains different libraries like Numpy, pandas, Matplotlib, etc.</p>\r\n<figure class=\"wp-block-image size-full\"><img class=\"wp-image-1384\" src=\"https://wanderwithcode.com/wp-content/uploads/2022/12/tkinter.png\" sizes=\"(max-width: 599px) 100vw, 599px\" srcset=\"https://wanderwithcode.com/wp-content/uploads/2022/12/tkinter.png 599w, https://wanderwithcode.com/wp-content/uploads/2022/12/tkinter-300x171.png 300w, https://wanderwithcode.com/wp-content/uploads/2022/12/tkinter-150x85.png 150w\" alt=\"Replit Online Compiler\" width=\"599\" height=\"341\" loading=\"lazy\">\r\n<figcaption class=\"wp-element-caption\"><strong>Replit Online Compiler</strong></figcaption>\r\n</figure>\r\n<figure class=\"wp-block-image size-large\"><img class=\"wp-image-1383\" src=\"https://wanderwithcode.com/wp-content/uploads/2022/12/replit-1024x488.png\" sizes=\"(max-width: 1024px) 100vw, 1024px\" srcset=\"https://wanderwithcode.com/wp-content/uploads/2022/12/replit-1024x488.png 1024w, https://wanderwithcode.com/wp-content/uploads/2022/12/replit-300x143.png 300w, https://wanderwithcode.com/wp-content/uploads/2022/12/replit-768x366.png 768w, https://wanderwithcode.com/wp-content/uploads/2022/12/replit-150x71.png 150w, https://wanderwithcode.com/wp-content/uploads/2022/12/replit.png 1366w\" alt=\"Replit Online Compiler\" width=\"1024\" height=\"488\" loading=\"lazy\">\r\n<figcaption class=\"wp-element-caption\"><strong>Replit Online Compiler</strong></figcaption>\r\n</figure>\r\n<ul>\r\n<li><strong>Price:&nbsp;</strong>Free</li>\r\n<li><strong>Co-founder:&nbsp;</strong>Amjad Masad</li>\r\n<li><strong>Platform Supported:</strong>&nbsp;Linux, Windows, Mac</li>\r\n<li><strong>Language Supported:</strong>&nbsp;English</li>\r\n</ul>\r\n<p><strong><mark class=\"has-inline-color has-black-color\">Features</mark></strong></p>\r\n<ul>\r\n<li>Simple and easy to understand</li>\r\n<li>GitHub integration</li>\r\n<li>Supports 50+ programming language</li>\r\n<li>High-level interpreted language</li>\r\n<li>Flexible, immerse, extending</li>\r\n<li>Develop any python code</li>\r\n<li>Collaborate with friends, team workers</li>\r\n<li>Quickly start any project</li>\r\n<li>No need to install the application</li>\r\n<li>Use from a web browser</li>\r\n</ul>\r\n<h3 class=\"wp-block-heading\"><a href=\"https://trinket.io/embed/python3/a5bd54189b\">Trinket</a></h3>\r\n<p>Trinket is an online compiler that serves as a compiler, IDE, and interpreter. It helps the user to write and debug advanced python code that contains different libraries like Numpy, pandas, Matplotlib, etc.</p>\r\n<figure class=\"wp-block-image size-large\"><img class=\"wp-image-1387\" src=\"https://wanderwithcode.com/wp-content/uploads/2022/12/trinket-1024x495.png\" sizes=\"(max-width: 1024px) 100vw, 1024px\" srcset=\"https://wanderwithcode.com/wp-content/uploads/2022/12/trinket-1024x495.png 1024w, https://wanderwithcode.com/wp-content/uploads/2022/12/trinket-300x145.png 300w, https://wanderwithcode.com/wp-content/uploads/2022/12/trinket-768x371.png 768w, https://wanderwithcode.com/wp-content/uploads/2022/12/trinket-150x72.png 150w, https://wanderwithcode.com/wp-content/uploads/2022/12/trinket.png 1366w\" alt=\"Trinket Online Compiler\" width=\"1024\" height=\"495\" loading=\"lazy\">\r\n<figcaption class=\"wp-element-caption\"><strong>Trinket Online Compiler</strong></figcaption>\r\n</figure>\r\n<ul>\r\n<li><strong>Price:&nbsp;</strong>Free</li>\r\n<li><strong>Co-founder:&nbsp;</strong>Elliott Hauser</li>\r\n<li><strong>Platform Supported:</strong>&nbsp;Linux, Windows, Mac</li>\r\n<li><strong>Language Supported:</strong>&nbsp;English</li>\r\n</ul>\r\n<p><strong><mark class=\"has-inline-color has-black-color\">Features</mark></strong></p>\r\n<ul>\r\n<li>Simple and easy to understand</li>\r\n<li>Run in any browser and in any device</li>\r\n<li>High-level interpreted language</li>\r\n<li>Flexible, immerse, extending</li>\r\n<li>Work instantly without any login, download plug-in, or configuration</li>\r\n<li>Easily share or embed the code</li>\r\n<li>Can install in the computer system</li>\r\n</ul>\r\n<h2 class=\"wp-block-heading\">Conclusion</h2>\r\n<p>In this article, we discussed Python compilers that are best and easy to use according to beginner and advanced programmers.</p>\r\n<h5 class=\"wp-block-heading\">Topic covered in this tutorial</h5>\r\n<ul>\r\n<li>What is Compiler</li>\r\n<li>Difference between Compiler and interpreter</li>\r\n<li>Compare local and online compiler</li>\r\n<li>Benefits of using an online python compiler</li>\r\n<li>Bets online Compiler for beginners and advanced programmers</li>\r\n</ul>', 'python.jpg', '2023-04-13 13:47:30', 15, 1, 0),
(13, 'Top 5 Summer Fruits for Good Health', '<p>Summer is the perfect time to enjoy a variety of fresh and juicy fruits. Not only do they taste delicious, but they are also packed with essential nutrients that can help keep your body healthy and hydrated. Here are the top 5 fruits to add to your summer diet:</p>\r\n<ol>\r\n<li>\r\n<p>Watermelon: Watermelon is one of the most refreshing fruits of summer. It is high in water content and contains vitamins A and C, potassium, and lycopene, which may help protect against certain types of cancer. Watermelon also contains citrulline, which can help reduce muscle soreness and improve exercise performance.</p>\r\n</li>\r\n<li>\r\n<p>Pineapple: Pineapple is another delicious and nutritious fruit that is perfect for summer. It contains bromelain, an enzyme that can help reduce inflammation and promote digestion. Pineapple is also rich in vitamin C, manganese, and antioxidants, which may help protect against cellular damage and chronic disease.</p>\r\n</li>\r\n<li>\r\n<p>Berries: If you are looking for a healthy snack to manage weight, berries like strawberries, blueberries, and raspberries are a perfect choice. Being low in calories and high in fiber, they can keep you feeling full for longer. Not only that, they are also rich in antioxidants and vitamin C, which can help prevent heart disease and cancer by reducing inflammation.</p>\r\n</li>\r\n<li>\r\n<p>Mango: Mangoes are a tropical fruit that is perfect for summer. They are rich in vitamin C, vitamin A, and antioxidants, which can help boost the immune system and protect against cellular damage. Mangoes also contain digestive enzymes, which can help improve digestion and prevent constipation.</p>\r\n</li>\r\n<li>\r\n<p>Kiwi: Kiwis are a small, but mighty fruit that is high in vitamin C and fiber. They also contain a range of other vitamins and minerals, such as vitamin K, potassium, and folate, which can help support healthy blood pressure and improve cardiovascular health.</p>\r\n</li>\r\n</ol>\r\n<p>In conclusion, adding these top 5 fruits to your summer diet can help keep you healthy, hydrated, and energized throughout the season. They are easy to incorporate into your daily routine, whether as a snack, in a smoothie, or as part of a meal. So, stock up on these summer fruits and enjoy the benefits of a healthy and delicious diet.</p>', 'blog6.jpg', '2023-04-13 15:08:51', 17, 1, 0),
(14, 'The Power and Significance of Art Across Cultures ', '<p>Art is a universal language that speaks to people across different cultures, languages, and time periods. It is a form of creative expression that has been present in human society since the dawn of civilization, and continues to evolve and thrive today.</p>\r\n<p>Art can take many forms, from painting and sculpture to music, literature, and performance. Each form of art offers a unique way to explore and express ideas, emotions, and experiences. Visual art, for example, can be used to create beautiful and thought-provoking images that can evoke powerful emotions in the viewer. Literature, on the other hand, can use words to create vivid and compelling stories that transport the reader to different worlds and perspectives.</p>\r\n<p>One of the most powerful aspects of art is its ability to transcend language and cultural barriers. A piece of art can be appreciated by people from different backgrounds and walks of life, and can even spark conversations and connections between individuals who may otherwise have nothing in common.</p>\r\n<p>Art also has the power to inspire and provoke change. Many artists use their work to raise awareness about social issues, challenge norms and conventions, and push for progress and social justice. Art can also serve as a form of healing and therapy, allowing individuals to express and process their emotions and experiences in a creative and therapeutic way.</p>\r\n<p>In conclusion, art is an essential part of human society and culture. It offers a way to explore, express, and connect with others across time and space, and can inspire change, healing, and social progress. Whether it is through painting, sculpture, music, or literature, art continues to be a powerful force in our world.</p>', 'blog70.jpg', '2023-04-13 15:19:22', 12, 1, 0),
(15, 'The Spiritual and Cultural Significance of Lotus', '<p>The lotus is a beautiful aquatic flower that has been revered for its spiritual and cultural significance for centuries. It is a symbol of purity, enlightenment, and rebirth in many cultures, and has inspired artists and poets around the world.</p>\r\n<p>In Hinduism, the lotus is associated with many deities, including Lord Brahma, who is said to have been born from a lotus flower. The flower is also a symbol of the chakras, or energy centers, in the body, with each petal representing a different aspect of spiritual awakening.</p>\r\n<p>In Buddhism, the lotus is a symbol of the path to enlightenment. It is said that the Buddha himself emerged from a lotus flower, and the flower is often depicted in Buddhist art and literature as a representation of spiritual growth and enlightenment.</p>\r\n<p>Beyond its spiritual significance, the lotus has also been used in many cultures for medicinal purposes. The seeds and roots of the lotus are believed to have healing properties and have been used to treat a variety of ailments, including diarrhea and inflammation.</p>\r\n<p>In many Asian cultures, the lotus is also a popular food. The seeds can be roasted and eaten as a snack, while the roots and stems can be used in soups and stews.</p>\r\n<p>The lotus flower has also inspired artists and designers around the world, with its beautiful shape and vibrant colors. Its intricate design and symbolism make it a popular subject in art, jewelry, and fashion.</p>\r\n<p>In conclusion, the lotus is a flower that holds immense spiritual, cultural, and medicinal significance in many cultures around the world. Its beauty and symbolism have inspired people for centuries, and it continues to hold a special place in our hearts and minds.</p>', 'blog91.jpg', '2023-04-13 15:22:41', 18, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) UNSIGNED NOT NULL,
  `ufname` varchar(50) NOT NULL,
  `ulname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `ufname`, `ulname`, `uname`, `uemail`, `upassword`, `avatar`, `is_admin`) VALUES
(1, 'Soumyadip', 'Saha', 'soumya2002', 'soumya@gmail.com', '$2y$10$syWSqVCIO0Kd1ci.AEUTF.zPX8GyBq1hWxWgSI0LBWRnXFAT5b1iC', 'icon1.png', 1),
(14, 'Joyitree', 'Mondal', 'anu2006', 'anu@gmail.com', '$2y$10$VB7r403Zb2yquS1sadvfUu.ahwjHi2m6n2pvqbe8GkIN9EFT2te0S', 'avatar12.jpg', 1),
(15, 'akash', 'saha', 'akash2002', 'akash@gmail.com', '$2y$10$YBL2e/vRGBzt4c06RlNsR.zEd0O0rDu6keMsL4axo.FkWgnrKmfQa', 'avatar11.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_author` (`author_id`),
  ADD KEY `FK_blog_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`cid`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
