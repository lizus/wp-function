# wp-function
一些方便使用的wp函数

## 可用函数表 `namespace LizusFunction;`
* `cut_html($text,$len,$sentence)` &lt;string&gt; - 裁剪html文本至$len长度，并且最多包含$sentence个中文句子，用于输出富文本摘要
* `cut_text($text,$len,$sentence,$dot)` &lt;string&gt; - 裁剪文本至$len长度，并且最多包含$sentence个中文句子，用于输出纯文本摘要
* `get_color($img,$x=5,$y=5)` : &lt;string&gt; - 返回图片某坐标的颜色值如#000000
* `get_current_url()` : &lt;string&gt; -  获取当前页的URL地址，包括$_GET，但不含hash
* `get_first_letter($str)` &lt;string&gt; - 获取第一个字的拼音首字母
* `get_ip_address()` : &lt;string&gt; - 返回客户端IP
* `get_rand($min,$max,$num)` : &lt;array&gt; - 生成在$min和$max之间一共$num个随机数
* `get_time_ago($agoTime,$dataFormat)` : &lt;string&gt; -  根据过去某一时间相对当前时间的差值来决定如果显示该时间，常用于文章显示发布时间，评论时间等
* `get_url_last_slash($url)` &lt;string&gt; - 获取url地址最后一个slash的内容
* `get_url_path($url)` : &lt;string&gt; -  获取$url地址的?前的部分
* `get_url_queries($url)` : &lt;array&gt; -  获取$url地址的$_GET部分
* `parse_url_query($q)` : &lt;array&gt; -  将类似url中的query段字符串格式化为键值对数组,相同键值将只取最后一个值
* `url_remove_page($url)` &lt;string&gt; - 去除url中page段
* `v_url($url,$queries)` : &lt;string&gt; - 拼接url字符串,$queries可以是类似$_GET的键值对数组或者用&拼接的url查询字符串
